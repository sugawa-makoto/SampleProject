<?php

namespace App\Http\Controllers;

class StampController extends Controller
{
    public function stamp()
    {
    	
    	$name = "山田太郎";
        
        return view('stamp',compact('name'));
    }
}
