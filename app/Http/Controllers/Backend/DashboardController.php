<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard.index');
    }
    
    public function members()
    {
        $members = Account::get();
        return view('backend.member.index', compact('members'));
    }
    
    public function delete(Request $request)
    {
        $member = Account::findOrFail($request->id);
        $member->delete();
        return back();
    }
}
