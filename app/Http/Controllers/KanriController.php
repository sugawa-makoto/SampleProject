<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KanriController extends Controller
{
    public function kanri(){
        return view('kanri');
    }
}
