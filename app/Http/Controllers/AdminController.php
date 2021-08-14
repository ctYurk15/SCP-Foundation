<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_user(Request $request)
    {
        return view('admin.add_user');
    }
}
