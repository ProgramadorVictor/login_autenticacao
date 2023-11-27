<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function logar(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);
        $dados = [
            'nome' => $request->Username,
            'password' => $request->Password,
        ];
        if (Auth::attempt(['name' => $request->Username, 'password' => $request->Password])) {
            return "Sucesso";
        } else {
            dd("Não logou!");
        }
        // return redirect()->route('login');
    }
}
