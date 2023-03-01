<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginLogoutController extends Controller
{


    public function logout(Request $request)
    {
        auth()->logout();
        //Flushing the session
        $request->session()->flush();
        return back();

        //add a /logout tag or button to logout user in the blade layouts
    }

    public function showLogin(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        //validating that email and password fields are not empty and right format
        $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user= User::where(['email'=>$request->email])->first();
        auth()->attempt($request->only('email', 'password'));
        $request->session()->put('user', $user);

        $request->session()->flash('message', 'You are logged in!');

        return redirect('/profile');
    }
}
