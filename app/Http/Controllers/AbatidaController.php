<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;

class AbatidaController extends Controller
{
    public function index() {

        return view('app.ovelhas.listarAbatida');
    }

    public function abatidalista(Request $request) {

        $ovelhas = Ovelha::where('abatida', 'sim')       
        ->paginate(10);
          
      return view('app.ovelhas.listarAbatida', ['ovelhas' => $ovelhas, 'request' => $request->all() ]);
    }

}