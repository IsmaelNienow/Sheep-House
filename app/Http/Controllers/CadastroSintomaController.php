<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroSintomaController extends Controller
{
    public function index() {
        return view('app.cadastrosintomadoenca');
    }
}
