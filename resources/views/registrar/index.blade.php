@extends('template.layout')
@section('titulo', 'Login')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-md-6 col-lg-4 bg-warning rounded-3 border border-2 p-4">
            <form autocomplete="off" method="post" action="{{route('registro-salvo')}}" id="registrar" name="registrar">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email:</label>
                    <input value="{{old('Email')}}"type="text" class="form-control" id="email" name="Email" placeholder="Digite o nome de email">
                    <div class="text-danger fw-bold" id="email-error">{{$errors->has('Email') ? $errors->first('Email') : ''}}</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Usuário: <span style="font-size:12px;" class="text-danger">OBS: Favor seguir o padrão de usuário: usuário.usuário</span></label>
                    <input value="{{old('Username')}}"type="text" class="form-control" id="username" name="Username" placeholder="Digite o nome de usuário">
                    <div class="text-danger fw-bold" id="username-error">{{$errors->has('Username')? $errors->first('Username'): ''}}</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Senha:</label>
                    <input value="{{old('Password')}}"type="password" class="form-control" id="password" name="Password" placeholder="Digite a senha do usuário">
                    <a href="{{route('login')}}" style="text-decoration:none;">Já tenho registro!</a>
                    <div class="text-danger fw-bold" id="password-error">{{$errors->has('Password')? $errors->first('Password'): ''}}</div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="acess" name="Acess">Registrar-se</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#email').on('focus',function(){
            $('#email-error').hide();
        });
        $('#username').on('focus',function(){
            $('#username-error').hide();
        });
        $('#password').on('focus',function(){
            $('#password-error').hide();
        });
    });
</script>
@endsection
