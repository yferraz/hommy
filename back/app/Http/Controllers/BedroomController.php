<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\Bedroom;

class BedroomController extends Controller
{
    public function createBedroom(Request $request){
        $bedroom = new Bedroom;
        $bedroom->totalBed = $request->totalBed;
        $bedroom->haveBathroom = $request->haveBathroom;
        $bedroom->haveTv = $request->haveTv;
        $bedroom->haveAirConditioner = $request->haveAirConditioner;
        $bedroom->save();
        return response()->json($bedroom);
    }

    public function showBedroom($id){
        $bedroom = Bedroom::findOrFail($id);
        return response()->json($bedroom);
    }

    public function listBedroom(){
        $bedroom = Bedroom::all();
        return response()->json([$bedroom]);
    }

    public function updateBedroom(Request $request, $id){
        $bedroom = Bedroom::findOrFail($id);
        if($request->totalBed){
            $bedroom->totalBed = $request->totalBed;
        }
        if($request->haveBathroom){
            $bedroom->haveBathroom = $request->haveBathroom;
        }
        if($request->haveTv){
            $bedroom->haveTv = $request->haveAirConditioner;
        }
        if($request->haveAirConditioner){
            $bedroom->haveAirConditioner = $request->haveAirConditioner;
        }
        $bedroom->save();
        return response()->json($bedroom);
    }

    public function deleteBedroom($id){
        Bedroom::destroy($id);
        return response()->json(['Quarto deletado']);
    }

    public function addRepublic($id, $republic_id){
        $bedroom = Bedroom::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $bedroom->republic_id = $republic_id;
        $bedroom->save();
        return response()->json($bedroom);
    }

    public function removeRepublic($id, $republic_id){
        $bedroom = Bedroom::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $bedroom->republic_id = NULL;
        $bedroom->save();
        return response()->json($bedroom);
    }
}