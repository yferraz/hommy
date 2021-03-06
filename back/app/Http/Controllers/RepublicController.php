<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use App\Comment;
use App\Http\Requests\RepublicRequest;

class RepublicController extends Controller
{
    public function createRepublic(RepublicRequest $request){
        $republic = new Republic;
        $republic -> createRepublic($request);
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

    public function updateRepublic(RepublicRequest $request, $id){
        $republic = Republic::findOrFail($id);
        $republic -> updateRepublic($request);
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

    public function locatario($id){
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario->get();
        return response()->json($locatarios);
    }

    public function locador($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }

    public function retornarUsuarios($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->users);
    }

    public function retornarProprietario($id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($republic->user_id);
        return response()->json($user);
    }

    public function listarComentarios($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic->comentariosRepublica);
    }
}
