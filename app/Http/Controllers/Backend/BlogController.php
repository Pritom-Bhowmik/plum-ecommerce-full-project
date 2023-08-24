<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    
    
    public function index(Request $request){
        return view('backend.blog.index');
    }
    
    public function create(Request $request){
        $edit = Blog::find(0);
        return view('backend.blog.create', compact('edit'));
    }
    
    public function store(Request $request){
        $request->validate([
                'title' => 'required',
                'description' => 'required',
                'thumbnail' => 'required|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/blog/'), $filename);
            $data['thumbnail'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        
        Blog::create($data);
        
        return back()->withSuccess('Created Successful.');
            
    }
    
    public function edit(Request $request){
        $edit = Blog::findOrFail($request->id);
        return view('backend.blog.edit', compact('edit'));
    }
    
    public function update(Request $request){
        $edit = Blog::findOrFail($request->id);
        $request->validate([
                'title' => 'required',
                'description' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/blog/'), $filename);
            $data['thumbnail'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        
        $edit->update($data);
        
        return back()->withSuccess('Updated Successful.');
    }
    
    public function delete(Request $request){
        $edit = Blog::findOrFail($request->id);
        $edit->delete();
        return back()->withSuccess('Deleted Successful.');
    }
    
    
    
    
    public function contact_index(Request $request){
        return view('backend.blog.contact');
    }
    
    
    
    
}
