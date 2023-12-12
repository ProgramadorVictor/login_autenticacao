<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\User;
use Illuminate\Support\Facades\Session;

class AutenticarController extends Controller
{
    public function login($msg = null)
    {
        return view('login.index',compact('msg'));
    }
    public function logar(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);

        $usuario = $request->input('Username');
        $senha = $request->input('Password');

        $user = User::where('name', $usuario)->where('password', $senha)->first();
        
        if ($user) {
            Session::put('usuario', $user);
            return redirect()->route('pagina-principal');
        } else {
            $user = User::where('name', '!=', $usuario)->first();
            if($user){
                $msg = "Esse usuário não existe!";
                return redirect()->route('login',compact('msg'));
            } else{
                $msg = "Senha incorreta!";
                return redirect()->route('login',compact('msg'));
            }
        }
    }
    public function registrar()
    {
        return view('registrar.index');
    }
    public function salvar(Request $request)
    {
        $request->validate([
            'Email' => 'required',
            'Username' => 'required',
            'Password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->Username;   
        $user->email = $request->Email;
        $user->password = $request->Password;
        $user->save();

        return redirect()->route('login');
    }
}
