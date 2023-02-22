<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function show(){
        return view('userRegistration');

    }
    public function registerUser(Request $request){
        /*

        Validates the data inputted by the user matches the set rules.

        */
        $this->validate($request, [
            'Fullname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:account,Email,exists,Account_ID'],
            'password' => ['required','min:8' ,'max:255', 'confirmed'],
            'password_confirmation' => 'required'
           ]);

           /*

           If validation passes is a new account is created.

           */
           Account::create([
            'User_Name' => $request->Fullname,
            'Email' =>$request->email,
            'User_Password' => Hash::make($request->password),
            ]);

            Auth::attempt([
            'Email' => $request->email,
            'User_Password' => $request->password
            ]);
            $account= Account::where(['Email'=>$request->email])->first();

            dd(Auth::check());
            //$request->session()->put('user', $account);
            return redirect('/shop');

    }
}
