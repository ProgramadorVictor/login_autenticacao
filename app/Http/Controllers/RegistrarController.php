<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrarController extends Controller
{
    public function registrar()
    {
        return view('registrar.index');
    }

    public function autenticar(Request $request)
    {
        $request->validate([
            'Email' => 'required',
            'Username' => 'required',
            'Password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->Username;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->save();

        return redirect('/')->with('message', 'Seu registro foi feito com sucesso!');
    }
}
