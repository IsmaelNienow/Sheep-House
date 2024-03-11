<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;
use App\Historico_Veterinario;

class SintomaController extends Controller
{
    public function index() {
           
        return view('app.ovelhas.listarSintoma');
    }
    
    public function sintomalista($id_ovelha, Request $request) {

        $sintomas = Historico_Veterinario::where('id_ovelha', $id_ovelha)->paginate(5);
        $ovelhas = Ovelha::findOrFail($id_ovelha);
    
        return view('app.ovelhas.listarSintoma', ['ovelhas' => $ovelhas, 'sintomas' => $sintomas, 'request' => $request->all()]);
    }
    
    public function adicionarsintoma($id_ovelha, Request $request){

        $ovelha = Ovelha::findOrFail($id_ovelha);
        $msg = '';

        // Inclusão
        if ($request->input('_token') != '' && $request->input('id') == '') {
            // Validação
            $regras = [
                "sintomas" => 'required|max:40',
                "tratamento" => 'required|max:40',
                "data_tratamento" => 'required',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'sintomas.max' => 'O campo deve ter no máximo 40 caracteres',
                'tratamento.max' => 'O campo deve ter no máximo 40 caracteres',
            ];

            $request->validate($regras, $feedback);

            // Criação do sintoma
            $sintoma = new historico_veterinario();
            $sintoma->sintomas = $request->input('sintomas');
            $sintoma->tratamento = $request->input('tratamento');
            $sintoma->data_tratamento = $request->input('data_tratamento');

            // Associar o sintoma à ovelha
            $sintoma->id_ovelha = $ovelha->id; // Adicionando o id_ovelha

            // Salvar o sintoma
            $sintoma->save();
            
            return redirect()->route('app.ovelhas.listarSintoma', ['id_ovelha' => $sintoma->id_ovelha]);
            $msg = 'Cadastro realizado com sucesso';
            
        }
        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $sintoma = historico_veterinario::find($request->input('id'));
            $update = $sintoma->update($request->all());

            if($update){
               return redirect()->route('app.ovelhas.listarSintoma', ['id_ovelha' => $sintoma->id_ovelha]);
               $msg = 'Dados atualizados com sucesso';
            } else{
                $msg = 'Erro ao tentar alterar o registro';
            }

            return redirect()->route('app.ovelhas.editarSintoma', ['id_ovelha' =>$id_ovelha, 'id' => $request->input('id'), 'msg' => $msg]);

        }

       return view('app.ovelhas.adicionarSintoma', ['ovelha' => $ovelha, 'msg' => $msg]);
    }  
    
    public function editarsintoma($id_ovelha, $id, $msg = ''){

        $sintoma = historico_veterinario::find($id);
        $ovelha = Ovelha::find($id_ovelha);
        
        return view('app.ovelhas.adicionarSintoma',['sintoma' => $sintoma,'ovelha' => $ovelha, 'msg' => $msg]);
        
    }
    
    public function excluirsintoma($id) {
        $sintoma = historico_veterinario::find($id);
    
        if (!$sintoma) {
            return redirect()->route('app.ovelhas.listarSintoma', ['id_ovelha' => $sintoma->id_ovelha])->with('erro', 'Sintoma não encontrado.');
        } else {
            $sintoma->forceDelete();
        }       
    
        return redirect()->route('app.ovelhas.listarSintoma', ['id_ovelha' => $sintoma->id_ovelha]);
    }
    
    
}
