<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Republic extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
      }
}
