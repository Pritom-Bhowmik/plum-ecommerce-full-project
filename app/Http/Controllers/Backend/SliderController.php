<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.slider.index');
    }

    public function create(Request $request)
    {
        return view('backend.slider.index');
    }

    public function store(Request $request)
    {
        return view('backend.slider.index');
    }

    public function edit(Request $request)
    {
        $edit = Slider::findOrFail($request->id);
        return view('backend.slider.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        
        $edit = Slider::findOrFail($request->id);
        $request->validate([
                'title' => 'required',
                'content' => 'required',
                'position' => 'required',
            ]);
            
            $data = [];
            $data['title']     = $request->title;
            $data['position'] = $request->position??0;
            $data['content']   = $request->content;
            
            
            if($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $filename = Str::slug($request->page_name).'.'.$thumbnail->getClientOriginalExtension();
                $path = public_path('/frontend/img/main-sliders/home-1/');
                $thumbnail->move($path, $filename);
                $data['thumbnail'] = $filename;
            }
            
            $edit->update($data);
            return back()->withSuccess('Updated Successful');
            
            
    }

    public function delete(Request $request)
    {
        return view('backend.slider.index');
    }
}
