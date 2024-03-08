<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;

class CadastroOvelhasController extends Controller
{
    public function index() {
        return view('app.ovelhas.index');
    }

    public function listar(Request $request) {

            $ovelhas = Ovelha::where('id', 'like', '%'.$request->input('brinco').'%')
            ->where('brinco', 'like', '%'.$request->input('brinco').'%')
            ->where('raca', 'like', '%'.$request->input('raca').'%')
            ->where('data_nascimento', 'like', '%'.$request->input('data_nascimento').'%')
            ->where('pai', 'like', '%'.$request->input('pai').'%')
            ->where('mae', 'like', '%'.$request->input('mae').'%')
            ->where('total_cria', 'like', '%'.$request->input('total_cria').'%')
            ->where('gemeas', 'like', '%'.$request->input('gemeas').'%')
            ->where('abate', 'like', '%'.$request->input('abate').'%')
            ->where('abatida', 'like', '%'.$request->input('abatida').'%')
            ->where('doente', 'like', '%'.$request->input('doente').'%')        
            ->paginate(2);
            
            return view('app.ovelhas.listar', ['ovelhas' => $ovelhas, 'request' => $request->all() ]);
    }

    public function adicionar(Request $request) {

        $msg = '';
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validação
            $regras=[
                "brinco" => 'required|min:2' ,
                "raca" =>'required|min:3|max:40',
                "data_nascimento" =>'required',
                "pai" =>'required|min:3|max:40',
                "mae"=>'required|min:3|max:40',
                "total_cria" =>'required',
                "gemeas" =>'required',
                "abate" =>'required',
                "abatida" =>'required',
                "doente" =>'required'
            ]; 
            
            $feedback= [
                'required' => 'O campo :attribute deve ser preenchido',
                'brinco.min' => 'O campo deve ter no minimo 2 numerários',
                'raca.max' => 'O campo deve ter no máximo 40 carcteres',
                'raca.min' => 'O campo deve ter no minimo 3 caracteres',
                'pai.max' => 'O campo deve ter no máximo 40 caracteres',
                'pai.min' => 'O campo deve ter no minimo 3 caracteres',
                'mae.max' => 'O campo deve ter no máximo 40 caracteres',
                'mae.min' => 'O campo deve ter no minimo 3 caracteres'
            ];

            $request->validate($regras, $feedback);

            $ovelha = new Ovelha();
            $ovelha->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        //Edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $ovelha = Ovelha::find($request->input('id'));
            $update = $ovelha->update($request->all());

            if($update){
                $msg = 'Dados atualizados com sucesso';
            } else{
                $msg = 'Erro ao tentar alterar o registro';
            }

            return redirect()->route('app.cadastroovelha.editar', ['id' => $request->input('id'), 'msg' => $msg]);

        }

        return view('app.ovelhas.adicionar',[ 'msg' => $msg]);

    }

    public function editar($id, $msg = ''){

        $ovelha = Ovelha::find($id);

        return view('app.ovelhas.adicionar',['ovelha' => $ovelha, 'msg' => $msg]);
        
    }

    public function excluir($id) {
       //Ovelha::find($id)->delete();
       Ovelha::find($id)->forceDelete();

       return redirect()->route('app.cadastroovelha');
    }


}