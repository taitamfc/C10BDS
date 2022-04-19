<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function get_users_by_branch_id($branch_id)
    {
        $users = User::where('branch_id', $branch_id)->get();
        return response()->json($users, 200);
    }
}
