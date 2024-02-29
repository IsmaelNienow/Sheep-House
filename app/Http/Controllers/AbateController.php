<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbateController extends Controller
{
    public function index() {
        return view('app.abate');
    }
}
