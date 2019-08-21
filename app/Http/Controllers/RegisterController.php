<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'name_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'city' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $request['profile']='Usuario';
       $user= User::create([
            'name' => $request['name'],
            'name_user' => $request['name_user'],
            'city' => $request['city'],
            'profile' =>$request['profile'] ,
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/')->with('flash','usuario registrado si desea inicie session');
    }

}
