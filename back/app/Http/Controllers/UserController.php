<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function createUser(UserRequest $request)
    {
        $user = new User;
        $user -> createUser($request);
        return response()->json($user);
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function listUser()
    {
        $user = User::all();
        return response()->json([$user]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user -> updateUser($request);
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return response()->json(['Usuário deletado']);
    }
}
