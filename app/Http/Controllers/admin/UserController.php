<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $datas = User::all();
        return view('admin.user.index', ['datas' => $datas]);
    }
    public function store(Request $request){
        request()->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',

                'nip' => 'nullable|gt:0',
                'nik' => 'nullable|gt:0',
                'gender' => 'nullable',
                'address' => 'nullable',
                'no_hp' => 'nullable|gt:0',

                'work_unit' => 'nullable',
                'position_kpb' => 'nullable',
                'position_department' => 'nullable'
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role'=> 'user',

            // 'role',
            // 'profile_picture',
            // 'status',

            'nip' => $request->nip,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'address' => $request->address,
            'no_hp' => $request->no_hp,

            'work_unit' => $request->work_unit,
            'position_kpb' => $request->position_kpb,
            'position_department' => $request->position_department
        ]);
        return redirect('dashboard/user')->with('success', 'User has been created');
    }
    public function edit($id){
        $data = User::findOrFail($id);
        return view('admin.user.edit', ['data' => $data]);
    }
    public function detail($id){
        $data = User::findOrFail($id);
        return view('admin.user.detail', ['data' => $data]);
    }
    public function update($id, Request $request){
        $data = User::findOrFail($id);
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
    public function destroy($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('dashboard/user')->with('success', 'User has been deleted');
    }
    public function changeStatus($id, Request $request){
        $data = User::findOrFail($id);
        if($data->status == 0){
            $data->status = 1;
        }else{
            $data->status = 0;
            $request->session()->flush();
            Auth::logout();
        }
        $data->update([
            'status' => $data->status
        ]);
        return redirect('dashboard/user')->with('success', 'User status has been updated');
    }
    public function changeRole($id, $role){
        $data = User::findOrFail($id);
        if($data->role != $role){
            $data->role = $role;
        }else{
            $data->role;
        }
        $data->update([
            'role' => $data->role
        ]);
        return redirect('dashboard/user')->with('success', 'User role has been updated');
    }
}
