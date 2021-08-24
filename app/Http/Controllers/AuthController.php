<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12'
        ]);

        $save = Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        if($save != null)
        {
            return back()->with('success', 'Success!');
        }
        else
        {
            return back()->with('fail', 'Something wen`t wrong');
        }

    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = Admin::where('email', '=', $request->email)->first();

        if($user != null)
        {
            if(Hash::check($request->get('password'), $user->password))
            {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('admin/dashboard');
            }
            else
            {
                return back()->with('fail', 'Wrong password');
            }
        }
        else
        {
            return back()->with('fail', 'There is not user with such email');
        }
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('auth/login');
        }
    }

    public function dashboard()
    {
        $data = ['LoggedUserInfo' => Admin::where('id', '=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

}
