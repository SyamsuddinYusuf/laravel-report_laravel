<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MS_USER extends Model
{
    //
    // protected $table = 'students';
    public function scopeFromView($query)
    {
        // return $query->from('API_MS_USER');
        return $query->from('vw_Jumlah_Container');
    }
}
