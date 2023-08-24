<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Order;
use App\Models\Categorie;
use App\Models\Service;
use App\Models\About;
use App\Models\Newsletter;

class FrontendController extends Controller
{
    //

    public function index(Request $request){
        $home_page = Page::where('slug', 'home')->first();
        $home_category = Categorie::all();
        return view('web.index', compact('home_page', 'home_category'));
    }

    public function shop(Request $request){
        $shop_page = Page::where('slug', 'shop')->first();
        return view('web.shop', compact('shop_page'));
    }
    
    public function shopDetails(Request $request, $id){
        $service = Service::findOrFail($id);
        return view('web.sproduct', compact('service'));
    }

    public function blog(Request $request){
        return view('web.blog');
    }

    public function about(Request $request){
        $about_page = Page::where('slug', 'about')->first();
        $about = About::findOrFail(1);
        return view('web.about', compact('about_page', 'about'));
    }

    public function contact(Request $request){
        $contact_page = Page::where('slug', 'contacts')->first();
        return view('web.contact', compact('contact_page'));
    }

    public function cart(Request $request){
        return view('web.cart');
    }

    public function contactSubmit(Request $request){
        $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required|max:255',
                'message' => 'required|max:500',
        ]);
            
        Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            
        return back()->withSuccess('Successful.');
    }
    
    public function newsletter(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
    
        Newsletter::create([
            'email' => $request->email,
        ]);
            
        return back()->with('message', 'Newsletter submitted successfully');
    }
    
    public function cartAdd(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $service->title,
                "quantity" => 1,
                "description" => $service->description,
                "price" => $service->price,
                "image" => $service->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product has been added to cart!');
    }
    
    public function cartUpdate(Request $request){
        if($request->id && $request->quantity && $request->quantity >= 1){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $total_price = 0;
            foreach($cart as $item){
                $total_price = ($total_price+($item['price'] * $item['quantity']));
            }
            return response()->json(['total_price'=>$total_price]);
        }
    }
    
    public function cartDelete(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('error', 'Product successfully deleted.');
        }
    }
    
    public function placeOrder(Request $request){
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'user_address' => 'required',
        ]);
        $cart = session()->get('cart');
        foreach($cart as $item){
            Order::create([
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
                'user_phone' => $request->user_phone,
                'user_address' => $request->user_address,
                'product_title' => $item['title'],
                'product_quentity' => $item['quantity'],
                'product_description' => $item['description'],
                'product_price' => $item['price'],
                'product_image' => $item['image']
            ]);
        }
        session()->forget('cart');
        session()->flash('message', 'Product successfully inserted');
    }
    
    
    
}
