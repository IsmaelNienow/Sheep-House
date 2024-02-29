<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbatidaController extends Controller
{
    public function index() {
        return view('app.abatido');
    }
}
