<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->cpf = $request->cpf;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();
        return response()->json($user);
    }

    public function showUser($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function listUser(){
        $user = User::all();
        return response()->json([$user]);
    }

    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);
        if($request->name){
            $user->name = $request->name;
        }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->password){
            $user->password = $request->password;
        }
        if($request->cpf){
            $user->cpf = $request->cpf;
        }
        if($request->dateOfBirth){
            $user->dateOfBirth = $request->dateOfBirth;
        }
        if($request->phoneNumber){
            $user->phoneNumber = $request->phoneNumber;
        }
        $user->save();
        return response()->json($user);
    }

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['Usuário deletado']);
    }

}
