<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function updateNameEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $nameChanged = $validatedData['name'] !== $user->name;
        $emailChanged = $validatedData['email'] !== $user->email;
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
    
        $user->save();
    
        if ($nameChanged && $emailChanged) {
            $message = 'Your name and email have been updated!';
        } elseif ($nameChanged) {
            $message = 'Your name has been updated!';
        } elseif ($emailChanged) {
            $message = 'Your email has been updated!';
        } else {
            $message = 'No changes made.';
        }
    
        return redirect()->back()->with('status', $message);
    }
    
    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        return redirect()->back()->with('password_status', 'Success! Your password has been changed successfully!');
    }
}

