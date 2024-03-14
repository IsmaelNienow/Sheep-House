@extends('site.layouts.basico')

@section('titulo','Home')

@section('conteudo')    
    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Sheep House - Controle de Ovinos</h1>
                <p>Software para gestão de Rebanhos ideal para sua Fazenda.<p>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png')}}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png')}}">
                    <span class="texto-branco">Sua Fazenda na nuvem</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png')}}">
                    <span class="texto-branco">Facilidade do manejo diário</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png')}}">
                    <span class="texto-branco">Controle completo de sua produção</span>
                </div>
            </div>

            <div class="video">
                <video  width="500" height="350" autoplay muted loop>
                    <source src="{{ asset('img/Video.mp4')}}" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Menu Principal</h1>
                <p>Cadastro de Ovelhas<p>
            </div>
        </div>
    </div>
@endsection    
