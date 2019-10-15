<?php

namespace App\Http\Controllers;

class StampController extends Controller {
    public function stamp(){
		$first_date = date( "Y年m月d日 H時i分s秒" ) ;
  		return view('stamp')->with('val', $first_date);
    }
    
}
