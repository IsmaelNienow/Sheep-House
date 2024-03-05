@extends('app.layouts.basico')

@section('titulo','cadastroovelha')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cadastrar Ovelha</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.cadastroovelha.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.cadastroovelha')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.cadastroovelha.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $ovelha->id ?? '' }}" >
                    @csrf
                    <input type="text" name="brinco" value="{{ $ovelha->brinco ?? old('brinco')}}" placeholder="Brinco" class="borda-preta">
                    {{ $errors->has('brinco') ? $errors->first('brinco'): ''}}

                    <input type="text" name="raca" value="{{ $ovelha->raca ?? old('raca')}}" placeholder="Raça" class="borda-preta">
                    {{ $errors->has('raca') ? $errors->first('raca'): ''}}

                    <input type="text" name="data_nascimento" value="{{ $ovelha->data_nascimento ?? old('data_nascimento')}}" placeholder="Data de Nascimento" class="borda-preta">
                    {{ $errors->has('data_nascimento') ? $errors->first('data_nascimento'): ''}}

                    <input type="text" name="pai" value="{{ $ovelha->pai ?? old('pai')}}" placeholder="Pai" class="borda-preta">
                    {{ $errors->has('pai') ? $errors->first('pai'): ''}}

                    <input type="text" name="mae" value="{{ $ovelha->mae ?? old('mae')}}" placeholder="Mãe" class="borda-preta">
                    {{ $errors->has('mae') ? $errors->first('mae'): ''}}

                    <input type="text" name="total_cria" value="{{ $ovelha->total_cria ?? old('total_cria')}}" placeholder="Total de Crias" class="borda-preta">
                    {{ $errors->has('total_cria') ? $errors->first('total_cria'): ''}}

                    <input type="text" name="gemeas" value="{{ $ovelha->gemeas ?? old('gemeas')}}" placeholder="Possui Irma Gemea ?" class="borda-preta">
                    {{ $errors->has('gemeas') ? $errors->first('gemeas'): ''}}

                    <input type="text" name="abate" value="{{ $ovelha->abate ?? old('abate')}}" placeholder="Para Abate ?" class="borda-preta">
                    {{ $errors->has('abate') ? $errors->first('abate'): ''}}

                    <input type="text" name="abatida" value="{{ $ovelha->abatida ?? old('abatida')}}" placeholder="Foi Abatida ?" class="borda-preta">
                    {{ $errors->has('abatida') ? $errors->first('abatida'): ''}}

                    <input type="text" name="doente" value="{{ $ovelha->doente ?? old('doente')}}" placeholder="Esta ou possui uma Doença ?" class="borda-preta">
                    {{ $errors->has('doente') ? $errors->first('doente'): ''}}

                    <button type="submit" class="borda-preta">Salvar</button>
                <form>
            </div>
        </div>

    </div>

@endsection