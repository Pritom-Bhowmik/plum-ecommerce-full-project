<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategorieController extends Controller
{
    //

    public function index(Request $request)
    {
        $categories = Categorie::get();
        return view('backend.categorie.index', compact('categories'));
    }

    public function create(Request $request)
    {
        return view('backend.categorie.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categorie_name' => 'required|string|min:4|max:50|unique:categories,name',
            'categorie_image' => 'required|string'
        ]);

        $data = []; 
        
        if($request->hasFile('categorie_image')){
            $file = $request->file('categorie_image');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/category/'), $filename);
            $data['image'] = $filename;
        }
        
        $data['name'] = $request->categorie_name;
        
        Categorie::create($data);
        
        return back()->withSuccess('Created Successful.');
    }

    public function edit(Request $request)
    {
        $categorie = Categorie::findOrFail($request->id);
        return view('backend.categorie.edit', compact('categorie'));
    }

    public function update(Request $request)
    {
        $categorie = Categorie::find($request->id);
        $data = []; 
        
        if($request->hasFile('categorie_image')){
            $file = $request->file('categorie_image');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/category/'), $filename);
            $data['image'] = $filename;
        }
        
        $data['name'] = $request->categorie_name;
        
        $categorie->update($data);
        
        return back()->withSuccess('Created Successful.');
    }

    public function delete(Request $request)
    {
        $categorie = Categorie::find($request->id);
        $categorie->delete();
        return back()->withSuccess('Delete Successful.');
    }

}
