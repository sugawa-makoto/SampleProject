<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['onsite_name', 'image_url', 'company_name'];
    public function onsites()
    {
        return $this->belongsTo(Onsite::class);
    }
}
