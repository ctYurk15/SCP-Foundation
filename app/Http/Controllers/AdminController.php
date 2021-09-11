<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        return view('admin.users', [
            'LoggedUserInfo' => User::getCurrentUser()
        ]);
    }
}
