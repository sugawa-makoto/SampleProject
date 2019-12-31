<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Onsite extends Model
{    
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
