<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budidaya extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
}
