@extends('template.layout')
@section('titulo', 'Login')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-md-6 col-lg-4 bg-warning rounded-3 border border-2 p-4">
            <form autocomplete="off" method="post" action="{{route('login-liberado')}}" id="login" name="login">
                {{csrf_field()}}
                {{print_r($errors)}}
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Usuário:</label>
                    <input type="text" class="form-control" id="username" name="Username" placeholder="Digite o nome de usuário">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Senha:</label>
                    <input type="password" class="form-control" id="password" name="Password" placeholder="Digite a senha do usuário">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" id="acess" name="Acess">Acessar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#acess').click(function(){
            if(($('#username').val()) && ($('#password').val())){
                $('#login').submit();
            }else{
                //Mensagem de erro!
            }
        })
    });
</script>
@endsection