<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerRating;

class CustomerRatingController extends Controller
{
    
    public function index(Request $request){
        return view('backend.rating.index');
    }
    
    public function create(Request $request){
        $edit = CustomerRating::find(0);
        return view('backend.rating.create', compact('edit'));
    }
    
    public function store(Request $request){
        $request->validate([
                'title' => 'required',
                'content' => 'required',
                'avatar' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
        $data = []; 
        
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/avatars/'), $filename);
            $data['avatar'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        
        CustomerRating::create($data);
        
        return back()->withSuccess('Created Successful.');
            
    }
    
    public function edit(Request $request){
        $edit = CustomerRating::findOrFail($request->id);
        return view('backend.rating.edit', compact('edit'));
    }
    
    public function update(Request $request){
        $edit = CustomerRating::findOrFail($request->id);
        
        $request->validate([
                'title' => 'required',
                'content' => 'required',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
        $data = []; 
        
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/avatars/'), $filename);
            $data['avatar'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        
        $edit->update($data);
        
        return back()->withSuccess('Updated Successful.');
    }
    
    public function delete(Request $request){
        $rating = CustomerRating::findOrFail($request->id);
        $rating->delete();
        return back()->withSuccess('Deleted Successful.');
    }


    
}
