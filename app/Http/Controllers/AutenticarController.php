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
    public function salvar(Request $req)
    {
        $usuario = $req->Username;
        $padrao = '/^[a-zA-Z]+\.[a-zA-Z]+$/';
        $validar = preg_match($padrao, $usuario) ? $usuario : '';
        if($validar){
            $regras = [
                'Email' => 'required|email',
                'Username' => 'required|min:3|unique:users,name',
                'Password' => 'required|min:6',
            ];
            $feedback = [
                'required' => 'O campo :attribute é requerido.',
                'Email.email' => 'O campo email deve ser um endereço de e-mail válido.',
                'Username.min' => 'O campo usuário deve ter pelo menos :min caracteres.',
                'Username.unique' => 'O campo usuario ja existe no banco de dados',
                'Password.min' => 'A senha deve ter pelo menos :min caracteres.',
            ];
            $req->validate($regras, $feedback);
            $user = new User();
            $user->name = $req->Username;   
            $user->email = $req->Email;
            $user->password = md5($req->Password);
            $user->save();
            return redirect()->route('login', ['msg' => 'Cadastro realizado com sucesso!']);
        }
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Username', 'Seu usuário não segue o padrão ');
        return redirect()->back()->withErrors($errors)->withInput($req->all());
    }
}
