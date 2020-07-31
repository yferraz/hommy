<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Republic;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comentariosRepublica()
    {
        return $this->belongsToMany('App\Republic');
    }

    public function comentarUsuario($user_id)
    {
        $comment = User::findOrFail($user_id);
        $this->user_id = $user_id;
        $this->save();
    }

    public function comentarRepublica($republic_id)
    {
        $comment = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }
}
