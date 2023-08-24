<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = User::query();
            return Datatables::of($model)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    if ($row->avatar) {
                        return '<img style="width:50px;height:50px;" class="img-thumbnail" src="' . asset('/storage/profile/' . $row->avatar) . '" >';
                    }
                    return '<img style="width:50px;height:50px;" class="img-thumbnail" src="https://via.placeholder.com/50x50" >';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route("backend.users.edit", $row->id) . '" class="action_edit_btn btn btn-success btn-sm">Edit</a> <a href="' . route("backend.users.delete", $row->id) . '" class="spin action_delete_btn btn btn-danger btn-sm"><svg class="spinner" viewBox="0 0 50 50">
                            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                            </svg> Delete</a>';
                })
                ->rawColumns(['avatar', 'action'])
                ->make(true);
        }
        return view('backend.admin.index');
    }

    public function create(Request $request)
    {
        return view('backend.admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:6|max:100|',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,webp'
        ]);

        if ($validator->passes()) {
            try {
                $data = [];
                if ($request->hasFile('avatar')) {
                    $file = $request->file('avatar');
                    $filename = 'profile-' . md5((time() * time()) * time()) . '.' . $file->getClientOriginalExtension();
                    $data['avatar'] = $filename;
                    $file->move(public_path('uploads'), $filename);
                }
                $data['name'] = $request->input('name');
                $data['email'] = $request->input('email');
                $data['password'] = Hash::make($request->input('password'));

                $user = User::create($data);

                if ($request->hasFile('avatar')) {
                    $path = public_path('uploads') . '/' . $filename;
                    $copy = storage_path('app/public/profile') . '/' . $filename;
                    if (File::exists($path) && $user->avatar == $filename) {
                        File::copy($path, $copy);
                        File::delete($path);
                    }
                }
                return response()->json(['status' => true, 'message' => 'New User Created Succesful.', 'data' => $user]);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => '500 - Server-side error']);
            }
        }
        return response()->json(['status' => false, 'message' => 'Validation Errors, Please try again.', 'errors' => $validator->messages()]);
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);
        return view('backend.admin.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:4|max:50',
                'email' => 'required|email|max:100|unique:users,email,' . $user->id,
                'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,webp'
            ]);

            if ($validator->passes()) {
                try {
                    $data = [];
                    if ($request->hasFile('avatar')) {
                        $file = $request->file('avatar');
                        $filename = 'profile-' . md5((time() * time()) * time()) . '.' . $file->getClientOriginalExtension();
                        $data['avatar'] = $filename;
                        $path = storage_path('app/public/profile') . '/' . $user->avatar;
                        if ($user->avatar && File::exists($path)) {
                            File::delete($path);
                        }
                        $file->move(public_path('uploads'), $filename);
                    }
                    $data['name'] = $request->input('name');
                    $data['email'] = $request->input('email');

                    $user->update($data);

                    if ($request->hasFile('avatar')) {
                        $path = public_path('uploads') . '/' . $filename;
                        $copy = storage_path('app/public/profile') . '/' . $filename;
                        if (File::exists($path) && $user->avatar == $filename) {
                            File::copy($path, $copy);
                            File::delete($path);
                        }
                    }
                    return response()->json(['status' => true, 'message' => 'User Updated Succesful.', 'data' => $user]);
                } catch (\Exception $e) {
                    return response()->json(['status' => false, 'message' => '500 - Server-side error']);
                }
            }
            return response()->json(['status' => false, 'message' => 'Validation Errors, Please try again.', 'errors' => $validator->messages()]);
        }
        return response()->json(['status' => false, 'message' => '404 Not Found!']);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $path = storage_path('app/public/profile') . '/' . $user->avatar;
            if ($user->avatar && File::exists($path)) {
                File::delete($path);
            }
            $user->delete();
            return response()->json(['status' => true, 'message' => 'Deleted Successful.']);
        }
        return response()->json(['status' => false, 'message' => '404 Not Found!']);
    }
    
    public function newsletter(Request $request)
    {
        $newsletter = Newsletter::get();   
        return view('backend.admin.newsletter', compact('newsletter'));
    }
    
    public function orders()
    {
        $order = Order::get();   
        return view('backend.admin.order', compact('order'));
    }    
}
