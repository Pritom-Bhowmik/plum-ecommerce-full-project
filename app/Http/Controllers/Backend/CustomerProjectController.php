<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\CustomerProject;

class CustomerProjectController extends Controller
{
    
    
    public function index(Request $request){
        return view('backend.project.index');
    }
    
    public function create(Request $request){
        $edit = CustomerProject::find(0);
        return view('backend.project.create', compact('edit'));
    }
    
    public function store(Request $request){
        $request->validate([
                'title' => 'required',
                'content' => 'required',
                'thumbnail' => 'required|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/portfolio/wide/'), $filename);
            $data['thumbnail'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        
        CustomerProject::create($data);
        
        return back()->withSuccess('Created Successful.');
            
    }
    
    public function edit(Request $request){
        $edit = CustomerProject::findOrFail($request->id);
        return view('backend.project.edit', compact('edit'));
    }
    
    public function update(Request $request){
        $edit = CustomerProject::findOrFail($request->id);
        $request->validate([
                'title' => 'required',
                'content' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/portfolio/wide/'), $filename);
            $data['thumbnail'] = $filename;
        }
        if($request->hasFile('thumbnail_hover')){
            $file = $request->file('thumbnail_hover');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/portfolio/wide/'), $filename);
            $data['thumbnail_hover'] = $filename;
        }
        
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        
        $edit->update($data);
        
        return back()->withSuccess('Updated Successful.');
    }
    
    public function delete(Request $request){
        $edit = CustomerProject::findOrFail($request->id);
        $edit->delete();
        return back()->withSuccess('Deleted Successful.');
    }
    
}
