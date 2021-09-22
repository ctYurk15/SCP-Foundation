<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\User;
use App\Models\PageType;

class AdminController extends Controller
{
    private function getGallery($way)
    {
        $path = public_path($way);
        $files = File::allFiles($path);

        return $files;
    }

    public function users(Request $request)
    {
        return view('admin.users', [
            'LoggedUserInfo' => User::getCurrentUser()
        ]);
    }

    public function publications()
    {
        $types = PageType::all();
        $files = $this->getGallery('images\publications');

        return view('admin.publications', [
            'LoggedUserInfo' => User::getCurrentUser(),
            'files' => $files,
            'types' => $types
        ]);
    }
}
