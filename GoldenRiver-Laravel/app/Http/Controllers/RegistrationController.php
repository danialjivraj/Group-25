<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function show(){
        return view('userRegistration');

    }
    public function registerUser(Request $request){
        //Validates the data inputted in the fields to check if it matches the set rules.
        $this->validate($request, [
            'Fullname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users,email,exists,0'],
            'password' => ['required','min:8' ,'max:255', 'confirmed'],
            'password_confirmation' => 'required'
           ]);

        //If validation passes is a new account is created.
        User::create([
            'name' => $request->Fullname,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
           ]);

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
           ]);

        $user= User::where(['email'=>$request->email])->first();

        $request->session()->put('user', $user);
        //dd(session()->has('user'));
        return redirect('/product');

    }
}
