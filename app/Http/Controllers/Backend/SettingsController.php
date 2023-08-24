<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{

    public function index()
    {
        return view('backend.settings.edit');
    }


    public function update(Request $request)
    {
        if($request->site_name){
            $this->putPermanentEnv('APP_NAME', '"' . $request->site_name . '"');
        }
        $this->putPermanentEnv('APP_URL', url('/'));

        $data = [];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo.' . $file->getClientOriginalExtension();
            $data['logo'] = $filename;
            $file->move(storage_path('/app/public/logo'), $filename);
        }
        
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon.' . $file->getClientOriginalExtension();
            $data['favicon'] = $filename;
            $file->move(storage_path('/app/public/logo'), $filename);
        }
        
        $setting = Setting::findOrFail(1);
        $data['site_name'] = $request->site_name;
        $data['site_type'] = $request->site_type;
        
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['copy_right'] = $request->copy_right;
        $data['map_latlong'] = $request->map_latlong;
        $data['google_script'] = $request->google_script;
        
        if($request->default_color){
            $data['background_color'] = '#18130C';
            $data['text_color'] = '#A8A7A5';
            $data['icon_color'] = '#B88768';
        }else{
            $data['background_color'] = $request->background_color;
            $data['text_color'] = $request->text_color;
            $data['icon_color'] = $request->icon_color;
            
        }
        
        
        try {
            $setting->update($data);
            return response()->json(['status' => true, 'message' => 'Updated Successful.']);
        } catch (\Exception $e) {
            return response()->json(['status' => true, 'message' => '500 - Server site error.', errors=> $e]);
        }
    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();
        $escaped = preg_quote('=' . env($key), '/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }

    public function password()
    {
        return view('backend.settings.password');
    }

    public function passwordSubmit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6|max:100|',
            'new_password' => 'required|min:6|max:100|',
            'confirm_password' => 'required_with:new_password|same:new_password|min:6|max:100|',
        ]);
        if ($validator->passes()) {
            $user = auth()->guard('web')->user();
            if (Hash::check($request->old_password, $user->password)) {
                User::find($user->id)->update(['password' => Hash::make($request->new_password)]);
                return response()->json(['status' => true, 'message' => 'Password Updated Successful.']);
            }
            $validator->getMessageBag()->add('old_password', 'Old Password does not match!');
        }
        return response()->json(['status' => false, 'message' => 'Validation Errors.', 'errors' => $validator->messages()]);
    }
}
