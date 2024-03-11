@extends('app.layouts.basico')

@section('titulo','sintoma')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cadastrar Sintoma</p>
        </div>

        <div class="menu">
            <ul>
                <a href="{{ route('app.ovelhas.listarSintoma', ['id' => $ovelha->id ?? '']) }}">Voltar para Listagem de Sintomas</a>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.ovelhas.adicionarSintoma', ['id_ovelha' => $ovelha->id, 'id' => $sintoma->id ?? '']) }}">
                    <input type="hidden" name="id" value="{{ $sintoma->id ?? '' }}" >
                    @csrf
                    <input type="text" name="sintomas" value="{{ $sintoma->sintomas ?? old('sintoma')}}" placeholder="Sintomas" class="borda-preta">
                    {{ $errors->has('sintoma') ? $errors->first('sintoma'): ''}}

                    <input type="text" name="tratamento" value="{{ $sintoma->tratamento ?? old('tratamento')}}" placeholder="Tratamento" class="borda-preta">
                    {{ $errors->has('tratamento') ? $errors->first('tratamento'): ''}}

                    <input type="text" name="data_tratamento" value="{{ $sintoma->data_tratamento ?? old('data_tratamento')}}" placeholder="Data do Tratamento" class="borda-preta">
                    {{ $errors->has('data_tratamento') ? $errors->first('data_tratamento'): ''}}

                    <button type="submit" class="borda-preta">Salvar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
