@extends('site.layouts.basico')

@section('titulo','Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>      

        <div class="informacao-pagina">
            <div style="width:20%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="post">
                    @csrf
                    <input name="usuario" value="{{ old('usuario')}}" type="text" placeholder="Usuário" class="borda-preta">
                     {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}

                    <input name="senha" value="{{ old('senha')}}" type="password" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    <button type="submit" class="borda-preta" style="width: 150px; height: 40px;">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : ''}}
            </div>    
        </div>  
    </div>
   
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png')}}">
            <img src="{{ asset('img/linkedin.png')}}">
            <img src="{{ asset('img/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(54)99948-2043</span>
            <br>
            <span>isma.hnienow@hotmail.com</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png')}}">
        </div>
    </div>
@endsection