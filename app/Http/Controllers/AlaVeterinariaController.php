<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlaVeterinariaController extends Controller
{
    public function index() {
        return view('app.alaveterinaria');
    }
}
