@extends('app.layouts.basico')

@section('titulo', 'cadastrosintomadoenca')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Sintomas</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.ovelha.alaveterinaria')}}">Voltar</a></li>
                <li><a href="{{ route('app.cadastroovelha')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 20%; margin-left: auto; margin-right: auto;">
                <!-- Formulário para cadastrar/editar sintomas -->
                <form action="{{ route('app.cadastrosintomadoenca.cadastrarSintoma', ['id' => $ovelha->id, 'sintomaId' => $sintomas->id ?? null]) }}" method="post">
                    @csrf
                    <input type="text" name="sintomas" value="{{ $sintomas->sintomas ?? old('sintomas')}}" placeholder="Sintoma" class="borda-preta">
                    {{ $errors->has('sintomas') ? $errors->first('sintomas'): ''}}

                    <input type="text" name="tratamento" value="{{ $sintomas->tratamento ?? old('tratamento')}}" placeholder="Tratamento realizado" class="borda-preta">
                    {{ $errors->has('tratamento') ? $errors->first('tratamento'): ''}}

                    <input type="text" name="data_tratamento" value="{{ $sintomas->data_tratamento ?? old('data_tratamento')}}" placeholder="Data do tratamento" class="borda-preta">
                    {{ $errors->has('data_tratamento') ? $errors->first('data_tratamento'): ''}}

                    <button type="submit">{{ isset($sintomas->id) ? 'Editar' : 'Cadastrar' }} Sintoma</button>
                </form>
            </div>

            <!-- Tabela para mostrar os sintomas existentes -->
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="2" width="90%">
                    <thead>
                        <tr>
                            <th>Sintomas</th>
                            <th>Tratamento</th>
                            <th>Data de tratamento</th>
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
                                <td>
                                    <a href="{{ route('app.cadastrosintomadoenca.excluir', ['id' => $sintoma->id, 'id_ovelha' => $ovelha->id]) }}" onclick="return confirmarExclusao()">Excluir</a>
                                </td>
                                <script>
                                    function confirmarExclusao() {
                                        return confirm('Tem certeza que deseja excluir este item?');
                                    }
                                </script>
                                <td>
                                    <a href="{{ route('app.cadastrosintomadoenca.cadastrarSintoma', ['id' => $ovelha->id, 'sintomaId' => $sintoma->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                {{ $sintomas->appends($request->all())->links() }}

                <br>
                Exibindo {{ $sintomas->count() }} sintomas de {{ $sintomas->total() }}
            </div>
        </div>
    </div>
@endsection
