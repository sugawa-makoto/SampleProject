<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// 何を使うか調べる↓

class RecordController extends Controller {
    public function record(){

        //月初から月末の間をforeach
       
        $data = ["りんご","概ね赤","2019年"];
        // recordと$dataを持ってbladeに行く事ができる↓
        return view('record', ['data' => $data]);
    }
    
}