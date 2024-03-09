<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\historico_veterinario;
use App\Ovelha;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class HistoricoVeterinarioController extends Controller
{
    public function index(Request $request) {
        return view('app.cadastrosintomadoenca');
    }

    public function cadastrosintomadoenca(Request $request, $id, $sintomaId = null) {
        $msg = '';
        $ovelha = Ovelha::findOrFail($id);
        $sintomas = historico_veterinario::where('id_ovelha', $id)->paginate(5);
        $sintomaParaEditar = null;

        if ($sintomaId) {
            $sintomaParaEditar = historico_veterinario::find($sintomaId);
        }

        if ($request->isMethod('post')) {
            // Validação
            $regras = [
                "sintomas" => 'required|max:50',
                "tratamento" => 'required|max:50',
                "data_tratamento" => 'required'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'sintomas.max' => 'O campo deve ter no máximo 40 caracteres',
                'tratamento.max' => 'O campo deve ter no máximo 40 caracteres'
            ];

            $request->validate($regras, $feedback);

            if ($sintomaId) {
                // Atualização do sintoma existente
                $sintoma = historico_veterinario::find($sintomaId);
                $sintoma->update($request->all());
                $msg = 'Dados atualizados com sucesso';
            } else {
                // Criação do sintoma com associação à ovelha
                $sintoma = new historico_veterinario($request->all());
                $sintoma->id_ovelha = $id;
                $sintoma->save();
                $msg = 'Cadastro realizado com sucesso';
            }

            // Redireciona após salvar o item
            return redirect()->route('app.cadastrosintomadoenca.listasintomas', ['id' => $id, 'msg' => $msg]);
        }

        // Restante do código permanece o mesmo
        return view('app.cadastrosintomadoenca', [
            'ovelha' => $ovelha,
            'sintomas' => $sintomas,
            'request' => $request,
            'msg' => $msg,
            'sintomaParaEditar' => $sintomaParaEditar,
        ]);
    }

    public function excluir(Request $request, $id) {
        historico_veterinario::find($id)->forceDelete();

        return redirect()->route('app.cadastrosintomadoenca.listasintomas', ['id' => $request->id_ovelha])
               ->with('success', 'Registro excluído com sucesso.');
    }
}
