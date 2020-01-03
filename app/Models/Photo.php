<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['onsite_name', 'image_url', 'company_name', 'onsite_id'];
    public function onsite()
    {
        return $this->belongsTo('App\Models\Onsite', 'onsite_id');
    }
}
