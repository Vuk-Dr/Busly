<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\ActivateUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.auth.register');
    }
    public function store(RegisterRequest $request){
        try{
            \DB::beginTransaction();
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = md5($request->password);
            $user->activation_code = uuid_create();
            $user->role_id = 1;
            $user->save();

            $mail = new ActivateUserMail($user);
            Mail::to($user->email)->send($mail);
            \DB::commit();
            return redirect()->route('login.index')->with('success', 'Successfully signed up, check your email for a verification link');
        }catch (\Throwable $e){
            \DB::rollBack();
            \Log::error($e->getMessage());
            return redirect()->route('login.index')->with('error','Something went wrong');
        }

    }
    public function activate($token){
        $user = User::where('activation_code', $token)->first();
        $date = new \DateTime();
        $user->email_verified_at = $date->format('Y-m-d h:i:s');
        $user->activation_code = null;
        $user->save();
        return redirect()->route('login.index')->with('success', 'Successfully activated your account');
    }
}
