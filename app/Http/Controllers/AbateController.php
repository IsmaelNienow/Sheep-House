<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovelha;

class AbateController extends Controller
{
    public function index() {

        return view('app.ovelhas.listarAbate');
    }

    public function abatelista(Request $request) {

        $ovelhas = Ovelha::where('abate', 'sim')       
        ->paginate(2);
          
      return view('app.ovelhas.listarAbate', ['ovelhas' => $ovelhas, 'request' => $request->all() ]);
    }

}
