@extends('app.layouts.basico')

@section('titulo', 'sintoma')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Lista dos sintomas da Ovelha</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.ovelha.adicionarSintoma', ['id' => optional($ovelhas)->id]) }}">Cadastrar Sintoma</a></li>
                <li><a href="{{ route('app.ovelha.listarDoente')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
               @if(session('erro'))
                 <div class="alert alert-danger">
                    {{ session('erro') }}
                 </div>
                @endif                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Sintoma</th>
                            <th>Tratamento</th>
                            <th>Data do Tratamento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sintomas as $sintoma)
                            <tr>
                                <td>{{ $sintoma->sintomas }}</td>
                                <td>{{ $sintoma->tratamento }}</td>
                                <td>{{ $sintoma->data_tratamento }}</td>
                                <td><a href="{{ route('app.ovelha.excluirSintoma', ['id' => $sintoma->ovelha->id]) }}" onclick="return confirm('Tem certeza que deseja excluir este sintoma?')">Excluir</a></td>
                                <td><a href="{{ route('app.ovelha.editarSintoma', ['id' => $sintoma->id]) }}" onclick="return confirm('Tem certeza que deseja editar este sintoma?')">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $sintomas->appends($request)->links() }}
                <br>
                Exibindo {{ $sintomas->count() }} sintomas de {{ $sintomas->total() }}
            </div>
        </div>

    </div>

@endsection
