<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroOvelhasController extends Controller
{
    public function index() {
        return view('app.cadastroovelha.index');
    }
}
