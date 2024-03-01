<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;

class CadastroOvelhasController extends Controller
{
    public function index() {
        return view('app.ovelhas.index');
    }

    public function listar() {
        return view('app.ovelhas.listar');
    }

    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != ''){
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

     return view('app.ovelhas.adicionar',[ 'msg' => $msg]);

    }
}