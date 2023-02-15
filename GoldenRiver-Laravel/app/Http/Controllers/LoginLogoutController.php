<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class LoginLogoutController extends Controller
{


public function logout(Request $request)
    {
    auth()-> logout();
    //Flushing the session
    $request->session()->flush();
    return back();

    //add a /logout tag or button to logout user in the blade layouts
    }
}
