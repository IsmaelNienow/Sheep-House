@extends('site.layouts.basico')

@section('titulo','Sobre-Nós')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Olá, eu sou o Sheep House</h1>
        </div>

        <div class="informacao-pagina">
            <p>O Sheep House - Controle de Ovinos é o sistema online de controle e gestão de rebanhos, que pode transformar e potencializar os negócios da sua fazenda.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
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