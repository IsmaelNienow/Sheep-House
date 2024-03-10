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
    
    public function sintomalista($id, Request $request) {

        $sintomas = Historico_Veterinario::where('id_ovelha', $id)->paginate(5);
        $ovelhas = Ovelha::findOrFail($id);
    
        return view('app.ovelhas.listarSintoma', ['ovelhas' => $ovelhas, 'sintomas' => $sintomas, 'request' => $request->all()]);
    }
    
    public function adicionarsintoma($id, Request $request){

        $ovelha = Ovelha::findOrFail($id);
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
            $msg = 'Cadastro realizado com sucesso';
            
        }
        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $sintoma = historico_veterinario::find($request->input('id'));
            $update = $sintoma->update($request->all());

            if($update){
                $msg = 'Dados atualizados com sucesso';
            } else{
                $msg = 'Erro ao tentar alterar o registro';
            }

            return redirect()->route('app.ovelhas.editarSintoma', ['id' => $request->input('id'), 'msg' => $msg]);

        }

       return view('app.ovelhas.adicionarSintoma', ['ovelha' => $ovelha, 'msg' => $msg]);
    }  
    
    public function editarsintoma($id, $msg = ''){

        $sintoma = historico_veterinario::find($id);

        return view('app.ovelhas.adicionarSintoma',['sintomas' => $sintoma, 'msg' => $msg]);
        
    }
    
    public function excluirsintoma($id) {
        //Ovelha::find($id)->delete();
        $sintoma = historico_veterinario::find($id);
       // dd($sintoma);
      if (!$sintoma) {
            return redirect()->route('app.ovelhas.listarSintoma')->with('erro', 'Sintoma não encontrado.');
        }
      else{
            historico_veterinario::find($id)->forceDelete();
        }       
       return redirect()->route('app.ovelhas.listarSintoma', ['id_ovelha' => $sintoma->id_ovelha]);
     }   
    
}
