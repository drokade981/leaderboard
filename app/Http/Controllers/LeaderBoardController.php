<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class LeaderBoardController extends Controller
{
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            $users = User::getUsers($request->all());
            return UserResource::collection($users);
        } else {
            return view ('leaderboard');
        }
    }
}
