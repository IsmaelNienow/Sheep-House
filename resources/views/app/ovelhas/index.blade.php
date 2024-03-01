@extends('app.layouts.basico')

@section('titulo','cadastroovelha')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cadastro Ovelhas</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.cadastroovelha.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.cadastroovelha')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.cadastroovelha.listar')}}">
                    @csrf
                    <input type="text" name="brinco" placeholder="Brinco" class="borda-preta">
                    <input type="text" name="raca" placeholder="Raça" class="borda-preta">
                    <input type="text" name="data_nascimento" placeholder="Data de Nascimento" class="borda-preta">
                    <input type="text" name="pai" placeholder="Pai" class="borda-preta">
                    <input type="text" name="mae" placeholder="Mae" class="borda-preta">
                    <input type="text" name="total_cria" placeholder="Total de Crias" class="borda-preta">
                    <input type="text" name="gemeas" placeholder="Possui Irma Gemea" class="borda-preta">
                    <input type="text" name="abate" placeholder="Para Abate" class="borda-preta">
                    <input type="text" name="abatida" placeholder="Foi Abatida" class="borda-preta">
                    <input type="text" name="doente" placeholder="Esta ou possui uma Doença" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                <form>
            </div>
        </div>

    </div>

@endsection