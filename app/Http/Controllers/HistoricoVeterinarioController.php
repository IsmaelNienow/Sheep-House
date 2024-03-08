<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\historico_veterinario;
use App\Ovelha;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class HistoricoVeterinarioController extends Controller
{
    public function index() {

        return view('app.cadastrosintomadoenca');
    }    

    public function listasintomas($id, Request $request) {
        $ovelha = Ovelha::findOrFail($id);
    
        $sintomas = historico_veterinario::where('id_ovelha', $id)
        ->paginate(2);
    
        return view('app.cadastrosintomadoenca', ['ovelha' => $ovelha, 'sintomas' => $sintomas, 'request' => $request]);
    }
          
            
    public function cadastrosintomadoenca(Request $request, $id) {
        $ovelha = Ovelha::findOrFail($id);
        $sintomas = historico_veterinario::where('id_ovelha', $id)->paginate(2);

        return view('app.cadastrosintomadoenca', ['ovelha' => $ovelha, 'sintomas' => $sintomas, 'request' => $request]);
    }

    public function cadastrarSintoma(Request $request, $id) {
        // Valide os dados do formulário
        $request->validate([
            'sintoma' => 'required|max:50',
            'tratamento' => 'required|max:50',
            'data_tratamento' => 'required|date',
        ]);
    
        $sintoma = new historico_veterinario;
        $sintoma->id_ovelha = $id;
        $sintoma->sintomas = $request->input('sintoma');
        $sintoma->tratamento = $request->input('tratamento');
        $sintoma->data_tratamento = $request->input('data_tratamento');
        
        $sintoma->save();
    
        // Redirecione de volta para a mesma página com uma mensagem de sucesso
        return Redirect::back()->with('success', 'Sintoma cadastrado com sucesso!');

        //Edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $sintoma = historico_veterinario::find($request->input('id'));
            $update = $sintoma->update($request->all());

            if($update){
                $msg = 'Dados atualizados com sucesso';
            } else{
                $msg = 'Erro ao tentar alterar o registro';
            }

            return redirect()->route('app.cadastrosintomadoenca.cadastrar', ['id' => $request->input('id'), 'msg' => $msg]);

        }
    }

    public function excluir(Request $request, $id) {
        try {
            // Lógica para excluir o registro da tabela historico_veterinario
            DB::table('historico_veterinario')->where('id', $id)->delete();
    
            // Redirecione para a rota da lista de sintomas com uma mensagem de sucesso
            return redirect()->route('app.cadastrosintomadoenca', ['id' => $request->id_ovelha])
                ->with('success', 'Registro excluído com sucesso.');
        } catch (\Exception $e) {
            // Em caso de erro, redirecione com uma mensagem de erro
            return redirect()->route('app.cadastrosintomadoenca', ['id' => $request->id_ovelha])
                ->with('error', 'Erro ao excluir o registro.');
        }
    }

    


}
