<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit(){
        $data = Auth::user();
        return view('component.settings.index', ['data' => $data]);
    }
    public function update(Request $request){
        $data = User::find(Auth::user()->id);
        if($request->profile_picture){
            request()->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'profile_picture' => 'required|file|mimes:jpg,png,jpeg',

                'nip' => 'nullable|gt:0',
                'nik' => 'nullable|gt:0',
                'gender' => 'nullable',
                'address' => 'nullable',
                'no_hp' => 'nullable|gt:0',

                'work_unit' => 'nullable',
                'position_kpb' => 'nullable',
                'position_department' => 'nullable'
            ]);
            if($data->profile_picture){
                File::delete(public_path($data->profile_picture));
            }
            $random = Str::random(5);
            $file_name = time().''.$random. '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/profile_picture'), $file_name);
            $path = "images/profile_picture/$file_name";

            $data->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'profile_picture' => $path,

                'nip' => $request->nip,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'address' => $request->address,
                'no_hp' => $request->no_hp,

                'work_unit' => $request->work_unit,
                'position_kpb' => $request->position_kpb,
                'position_department' => $request->position_department
            ]);
        }
        else{
            request()->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',

                'nip' => 'nullable|gt:0',
                'nik' => 'nullable|gt:0',
                'gender' => 'nullable',
                'address' => 'nullable',
                'no_hp' => 'nullable|gt:0',

                'work_unit' => 'nullable',
                'position_kpb' => 'nullable',
                'position_department' => 'nullable'
            ]);
            $data->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,

                'nip' => $request->nip,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'address' => $request->address,
                'no_hp' => $request->no_hp,

                'work_unit' => $request->work_unit,
                'position_kpb' => $request->position_kpb,
                'position_department' => $request->position_department
            ]);
        }
        return redirect('settings')->with('success', 'Profile has been updated');
    }
    public function changePassword(Request $request){
        $data = User::find(Auth::user()->id);
        $data->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('settings')->with('success', 'Password has been changed');
    }
}
