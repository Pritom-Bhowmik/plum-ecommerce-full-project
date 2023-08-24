<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PageController extends Controller
{

    public function index(){
        return view('backend.pages.index');
    }

    public function edit(Request $request){
        $edit = Page::where('slug', $request->slug)->first();
        return view('backend.pages.edit', compact('edit'));
    }

    public function update(Request $request){
        $page = Page::where('slug', $request->slug)->first();
        if($page){
            $request->validate([
                    'page_name' => 'required|unique:pages,page_name,'.$page->id,
                ]);
                
            $data = [];
            $data['page_name']      = $request->page_name;
            // $data['slug']           = Str::slug($request->page_name);
            $data['page_title']     = $request->page_title;
            $data['page_description'] = $request->page_description;
            $data['page_content']   = $request->page_content;
            $data['meta_title']     = $request->meta_title;
            $data['meta_description'] = $request->meta_description;
            $data['meta_keyword']   = $request->meta_keyword;
            
            
            if($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $filename = Str::slug($request->page_name).'.'.$thumbnail->getClientOriginalExtension();
                $path = public_path('/frontend/img/backgrounds/');
                $thumbnail->move($path, $filename);
                $data['thumbnail'] = $filename;
            }
            
            
            $page->update($data);
            return back()->withSuccess('Updated Successful.');
        }
        return abort(404);
    }
}
