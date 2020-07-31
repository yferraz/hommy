<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Http\Requests\RepublicRequest;

class Republic extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function users()
  {
    return $this->hasMany('App\User');
  }

  public function userLocatario()
  {
    return $this->hasOne('App\User');
  }

  public function userFavoritas()
  {
    return $this->belongsToMany('App\User');
  }

  public function comentariosRepublica()
  {
    return $this->hasMany('App\Comment');
  }

  public function createRepublic(RepublicRequest $request)
  {
    $this->name = $request->name;
    $this->zipCode = $request->zipCode;
    $this->city = $request->city;
    $this->street = $request->street;
    $this->number = $request->number;
    $this->totalBathroom = $request->totalBathroom;
    $this->haveBackyard = $request->haveBackyard;
    $this->acceptPets = $request->acceptPets;
    $this->save();
  }

  public function updateRepublic(RepublicRequest $request)
  {
    if ($request->name) {
      $this->name = $request->name;
    }
    if ($request->zipCode) {
      $this->zipCode = $request->zipCode;
    }
    if ($request->city) {
      $this->city = $request->city;
    }
    if ($request->street) {
      $this->street = $request->street;
    }
    if ($request->number) {
      $this->number = $request->number;
    }
    if ($request->totalBathroom) {
      $this->totalBathroom = $request->totalBathroom;
    }
    if ($request->haveBackyard) {
      $this->haveBackyard = $request->haveBackyard;
    }
    if ($request->acceptPets) {
      $this->acceptPets = $request->acceptPets;
    }
    $this->save();
  }

  public function anunciar($user_id)
  {
    $user = User::findOrFail($user_id);
    $this->user_id = $user_id;
    $this->save();
  }

  public function removeUsuario()
  {
    $this->user_id = NULL;
    $this->save();
  }
}
