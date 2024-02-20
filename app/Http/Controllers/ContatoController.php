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

        $request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'required',
            'motivo_contato'=>'required',
            'mensagem'=>'required|max:2000'
        ]);
    }
};    
   