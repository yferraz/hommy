<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    public function republics(){
        return $this->belongsTo('App\Republic');
      }
}
