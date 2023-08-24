<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.about.index');
    }
    public function edit(Request $request)
    {
        $edit = About::findOrFail($request->id);
        return view('backend.about.edit', compact('edit'));
    }
    
    
    public function update(Request $request)
    {
        
        $edit = About::findOrFail($request->id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
            
        $data = [];
        $data['title']     = $request->title;
        $data['content']   = $request->content;
        
        
        if($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time().'.'.$thumbnail->getClientOriginalExtension();
            $path = public_path('/frontend/img/about/');
            $thumbnail->move($path, $filename);
            $data['thumbnail'] = $filename;
        }
        if($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time().'.'.$video->getClientOriginalExtension();
            $path = public_path('/frontend/img/about/');
            $video->move($path, $filename);
            $data['video'] = $filename;
        }
        
        
        $edit->update($data);
        return back()->withSuccess('Updated Successful');
            
            
    }
}
