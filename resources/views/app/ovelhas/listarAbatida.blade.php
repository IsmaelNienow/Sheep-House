@extends('app.layouts.basico')

@section('titulo','abatido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Lista das Ovelhas Abatidas</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.cadastroovelha.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.cadastroovelha')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Brinco</th>
                            <th>Raça</th>
                            <th>Nascimento</th>
                            <th>Raça do Pai</th>
                            <th>Raça da Mae</th>
                            <th>Total de Crias</th>
                            <th>Gemeas</th>
                            <th>Abate</th>
                            <th>Abatida</th>
                            <th>Doente</th>
                            <th></th>
                            <th></th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ovelhas as $ovelha)
                            <tr>
                                <td>{{ $ovelha->brinco}}</td>
                                <td>{{ $ovelha->raca}}</td>
                                <td>{{ $ovelha->data_nascimento}}</td>
                                <td>{{ $ovelha->pai}}</td>
                                <td>{{ $ovelha->mae}}</td>
                                <td>{{ $ovelha->total_cria}}</td>
                                <td>{{ $ovelha->gemeas}}</td>
                                <td>{{ $ovelha->abate}}</td>
                                <td>{{ $ovelha->abatida}}</td>
                                <td>{{ $ovelha->doente}}</td>
                                <td><a href="{{ route('app.cadastroovelha.excluir', $ovelha->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.cadastroovelha.editar', $ovelha->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>                   
                </table>
                    {{ $ovelhas->appends($request)->links() }}
                <br>
                    Exibindo {{ $ovelhas->count() }} ovelhas de {{ $ovelhas->total() }}                                   
            </div>
        </div>

    </div>

@endsection