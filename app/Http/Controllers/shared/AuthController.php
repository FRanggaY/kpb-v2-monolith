<?php

namespace App\Http\Controllers\shared;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == null) {
                return redirect()->intended('dashboard');
            }
        }
        return view('shared.login');
    }
    public function authenticate(Request $request){
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        // password using bcrypt
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->status == 0){
                $request->session()->flush();
                Auth::logout();
            }
            else{
                if ($user->level == 'admin') {
                    return redirect()->intended('dashboard')->with('success', 'success login admin');
                } elseif ($user->level == 'user') {
                    return redirect()->intended('dashboard')->with('success', 'success login user');
                } elseif ($user->level == null) {
                    return redirect()->intended('dashboard')->with('success', 'success login guest');
                }
                return redirect()->intended('/');
            }
        }else{
            return redirect('login')->with('failed', 'username or password wrong');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_failed' => 'These credentials do not match our records.']);
    }
    public function logout (Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login')->with('success', 'logout success');;
    }
}
