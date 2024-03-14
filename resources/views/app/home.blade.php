@extends('app.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Home</p>
    </div>

    <div class="tela-animada">
        <div class="splash-screen">
            <div class="imagem-container">
                <img src="{{ asset('img/1.png') }}" alt="Logo 1" style= "width: 520px;">
                <img src="{{ asset('img/2.png') }}" alt="Logo 2" style= "width: 520px;">
                <img src="{{ asset('img/3.png') }}" alt="Logo 3" style= "width: 520px;">
            </div>
            <p>Carregando...</p>
        </div>
    </div>

</div>

@endsection
