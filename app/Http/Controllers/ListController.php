<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ListController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user_list', [
            'users' => $users,
        ]);
    }

    public function delete(Request $request)
    {
        User::deleteUser($request->id);
        return redirect()->action([ListController::class, 'index']);
    }

    public function restore(Request $request)
    {
        User::restoreUser($request->id);
        return redirect()->action([ListController::class, 'index']);
    }
}
