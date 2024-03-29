@extends('template.layout')
@section('titulo', 'Login')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-md-6 col-lg-4 bg-warning rounded-3 border border-2 p-4">
            <form autocomplete="off" method="post" action="{{route('login-autenticado')}}" id="login" name="login">
                @csrf
                <div class="text-center text-danger fw-bold" id="msg" name="Msg">{{isset($msg) ? $msg : ''}}</div>
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Usuário:</label>
                    <input value="{{old('Username')}}"type="text" class="form-control" id="username" name="Username" placeholder="Digite o nome de usuário">
                    <div class="text-danger fw-bold" id="username-error">{{$errors->has('Username')? ' O nome de usuário é requerido!': ''}}</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Senha:</label>
                    <input value="{{old('Password')}}"type="password" class="form-control" id="password" name="Password" placeholder="Digite a senha do usuário">
                    <a href="{{route('registrar')}}" style="text-decoration:none;">Não tenho registro?</a>
                    <div class="text-danger fw-bold" id="password-error">{{$errors->has('Password')? ' A senha de usuário é requerida!': ''}}</div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="acess" name="Acess">Acessar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#msg').text() == "Cadastro realizado com sucesso!" ? $('#msg').removeClass('text-danger').addClass('text-success') : $('#msg').removeClass('text-success').addClass('text-danger');
    });
    $('#username').on('focus',function(){
        $('#username-error').hide();
        $('#msg').hide();
    });
    $('#password').on('focus',function(){
        $('#password-error').hide();
        $('#msg').hide();
    });
    $('#acess').on('click', function(){
        $('#msg').removeClass('text-success').text('S').show();
        //Cadastro realizado com sucesso ainda.
    });
</script>
@endsection
