<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PageType;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        return view('admin.users', [
            'LoggedUserInfo' => User::getCurrentUser()
        ]);
    }

    public function publications()
    {
        $types = PageType::all();

        return view('admin.publications', [
            'LoggedUserInfo' => User::getCurrentUser(),
            'types' => $types
        ]);
    }
}
