<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }
    public function login(LoginRequest $request){
        $email = $request->email;
        $password = md5($request->password);

        $user = User::with('role')->where('email', $email)->first();
        if(!$user || $user->password != $password){
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        if(!$user->email_verified_at){
            return redirect()->back()->with('error', 'Please verify your email');
        }
        session(['user' => $user]);
        if($user->role->name == 'admin'){
            return redirect()->route('admin.index');
        }
        return redirect()->route('home.index');
    }

    public function logout() {
        session()->remove("user");
        return redirect()->route("login.index");
    }
}
