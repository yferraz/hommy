<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Bedroom;

class Republic extends Model
{
    public function users(){
      return $this->belongsTo('App\User');
    }
    
    public function bedrooms(){
      return $this->hasMany('App\Bedroom');
    }
}
