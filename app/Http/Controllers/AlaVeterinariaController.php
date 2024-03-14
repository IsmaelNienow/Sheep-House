<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;

class AlaVeterinariaController extends Controller
{
    public function index() {

        return view('app.ovelhas.listarDoente');
    }

    public function doentelista(Request $request) {

        $ovelhas = Ovelha::where('doente', 'sim')       
        ->paginate(10);
          
      return view('app.ovelhas.listarDoente', ['ovelhas' => $ovelhas, 'request' => $request->all() ]);
    }

}