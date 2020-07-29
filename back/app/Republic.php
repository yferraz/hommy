<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Bedroom;
use App\Http\Requests\RepublicRequest;

class Republic extends Model
{
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

  public function updateRepublic(RepublicRequest $request){
    if($request->name){
        $this->name = $request->name;
    }
    if($request->zipCode){
        $this->zipCode = $request->zipCode;
    }
    if($request->city){
        $this->city = $request->city;
    }
    if($request->street){
        $this->street = $request->street;
    }
    if($request->number){
        $this->number = $request->number;
    }
    if($request->totalBathroom){
        $this->totalBathroom = $request->totalBathroom;
    }
    if($request->haveBackyard){
        $this->haveBackyard = $request->haveBackyard;
    }
    if($request->acceptPets){
        $this->acceptPets = $request->acceptPets;
    }
    $this->save();
}

  public function users()
  {
    return $this->belongsTo('App\User');
  }

  public function bedrooms()
  {
    return $this->hasMany('App\Bedroom');
  }
}
