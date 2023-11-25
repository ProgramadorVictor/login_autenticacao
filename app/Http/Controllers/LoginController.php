<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login.index');
    }
    public function logar(Request $req){
        $req->validate([
            'Username' => 'required',
            'Password' => 'required'
        ]);
        $feedback =[
            'Username.required' => 'O nome de usuário é obrigatório',
            'Password.required' => 'A senha de usuário é obrigatório'
        ];
        return redirect()->route('login', compact(['feedback' => $feedback]));
    }

}
