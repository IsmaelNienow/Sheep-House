<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
                
        return view('site.contato',['titulo'=> 'Contato (teste)','motivo_contatos' => $motivo_contatos]); 
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'Ocampo nome precisa ser preenchido',
            'nome.min'  => 'O campo nome precisa ter no minimo 3 carcteres',
            'nome.max' => 'O campo nome deve ter no maximo 40 carcteres',
            "motivo_contatos_id.required" => 'O campo de motivo contato deve ser informado',
            'email.email' => 'O campo E-mail, não é valido',
            'mensagem.max' => "O campo mensagem deve ter no máximo 2000 carcateres",
            "mensagem" => 'O campo de mensagem deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');   
    }
}    
   