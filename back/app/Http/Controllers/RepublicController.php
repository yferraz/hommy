<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use App\Http\Requests\RepublicRequest;

class RepublicController extends Controller
{
    public function createRepublic(RepublicRequest $request){
        $republic = new Republic;
        $republic->name = $request->name;
        $republic->zipCode = $request->zipCode;
        $republic->city = $request->city;
        $republic->street = $request->street;
        $republic->number = $request->number;
        $republic->totalBathroom = $request->totalBathroom;
        $republic->haveBackyard = $request->haveBackyard;
        $republic->acceptPets = $request->acceptPets;
        $republic->save();
        return response()->json($republic);
    }

    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic(Request $request, $id){
        $republic = Republic::findOrFail($id);
        if($request->name){
            $republic->name = $request->name;
        }
        if($request->zipCode){
            $republic->zipCode = $request->zipCode;
        }
        if($request->city){
            $republic->city = $request->city;
        }
        if($request->street){
            $republic->street = $request->street;
        }
        if($request->number){
            $republic->number = $request->number;
        }
        if($request->totalBathroom){
            $republic->totalBathroom = $request->totalBathroom;
        }
        if($request->haveBackyard){
            $republic->haveBackyard = $request->haveBackyard;
        }
        if($request->acceptPets){
            $republic->acceptPets = $request->acceptPets;
        }
        $republic->save();
        return response()->json($republic);
    }

    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['República deletada']);
    }

    public function addUser($id, $user_id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($user_id);
        $republic->user_id = $user_id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeUser($id, $user_id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($user_id);
        $republic->user_id = NULL;
        $republic->save();
        return response()->json($republic);
    }
}
