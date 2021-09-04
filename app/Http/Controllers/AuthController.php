<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

   /* public function register()
    {
        return view('auth.register');
    }*/

    public function save(Request $request)
    {
        //validation
        $request->validate([
            'login' => 'required|unique:users',
            'name' => 'required',
            'home_address' => 'required',
            'access_level' => 'required|integer|between:1,5',
            'birthdate' => 'required',
            'sex' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $save = User::create([
            'login' => $request->get('login'),
            'name' => $request->get('name'),
            'home_address' => $request->get('home_address'),
            'access_level' => $request->get('access_level'),
            'birthdate' => $request->get('birthdate'),
            'sex' => $request->get('sex'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        if($save != null)
        {
            return response()->json(["success" => true], 200);
        }
        else
        {
            return response()->json(["success" => false], 400);
        }

    }

    public function check(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:5|max:12'
        ]);

        $user = User::where('login', '=', $request->login)->first();

        if($user != null)
        {
            if(Hash::check($request->get('password'), $user->password))
            {
                $request->session()->put('LoggedUser', $user->id);
                return response()->json(["success" => true, 'url' => route('dashboard')], 200);
            }
            
            return response()->json(["success" => false, 'message' => 'Wrong password'], 401);
        }

        return response()->json(["success" => false, 'message' => 'There is not user with such login'], 401);
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect(route('login'));
        }
    }

    public function dashboard()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('main.dashboard', $data);
    }

}
