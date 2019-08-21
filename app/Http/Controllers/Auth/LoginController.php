<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

public function showLoginForm()
{
    return view('auth.login');
}



    public function login()
    {
       $s= $this->validate(request(),[
            'email'=>'email|required|string',
            'password'=>'required|string'
        ]);
       if (Auth::attempt($s)) {
           if (auth()->user()->profile=='Administrador') {
               return redirect()->route('adminUserIndex');
           }else{
            return redirect()->route('userIndex');
           }
       }
       return back()->withErrors(['email'=>'Valor no existente en nuestros registros',
       'password'=>'Valor no existente en nuestros registros']);
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
   
}
