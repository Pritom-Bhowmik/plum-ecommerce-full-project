<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
class TeamController extends Controller
{
    //
    
    public function index(Request $request){
        return view('backend.team.index');
    }
    
    public function create(Request $request){
        $edit = Team::find(0);
        return view('backend.team.create', compact('edit'));
    }
    
    public function store(Request $request){
        $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'avatar' => 'required|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/team/'), $filename);
            $data['avatar'] = $filename;
        }
        
        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        
        Team::create($data);
        
        return back()->withSuccess('Created Successful.');
            
    }
    
    public function edit(Request $request){
        $edit = Team::findOrFail($request->id);
        return view('backend.team.edit', compact('edit'));
    }
    
    public function update(Request $request){
        $edit = Team::findOrFail($request->id);
        $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'avatar' => 'nullable|image|mimes:jpg,png,git,webp,jpeg',
            ]);
        $data = []; 
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/img/team/'), $filename);
            $data['avatar'] = $filename;
        }
        
        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        
        $edit->update($data);
        
        return back()->withSuccess('Updated Successful.');
    }
    
    public function delete(Request $request){
        $edit = Team::findOrFail($request->id);
        $edit->delete();
        return back()->withSuccess('Deleted Successful.');
    }
}
