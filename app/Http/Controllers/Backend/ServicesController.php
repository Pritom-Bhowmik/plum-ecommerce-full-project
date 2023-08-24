<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.service.index');
    }
    public function create(Request $request)
    {
        return view('backend.service.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_title' => 'required|string',
            'product_image' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
        ]);

        $data = []; 
        
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/product/'), $filename);
            $data['image'] = $filename;
        }
        
        $data['title'] = $request->product_title;
        $data['category'] = $request->product_category;
        $data['price'] = $request->product_price;
        $data['description'] = $request->product_description;
        
        Service::create($data);
        
        return back()->withSuccess('Created Successful.');
    }
    public function edit(Request $request)
    {
        $edit = Service::findOrFail($request->id);
        return view('backend.service.edit', compact('edit'));
        
    }
    public function update(Request $request)
    {
        $edit = Service::findOrFail($request->id);
        $data = []; 
        
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/product/'), $filename);
            $data['image'] = $filename;
        }
        
        $data['title'] = $request->product_title;
        $data['category'] = $request->product_category;
        $data['price'] = $request->product_price;
        $data['description'] = $request->product_description;
            
        $edit->update($data);
        return back()->withSuccess('Updated Successful');
            
            
    }
}
