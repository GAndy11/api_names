<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    /**
     * Display a listing of a names
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('welcome', [
            
        ]);
    }
}
