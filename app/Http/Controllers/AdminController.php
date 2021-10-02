<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\User;
use App\Models\PageType;
use App\Models\ObjectClass;

class AdminController extends Controller
{
    private function getGallery($way)
    {
        $path = public_path('images\\'.$way);
        $files = File::allFiles($path);

        return $files;
    }

    public function users()
    {
        return view('admin.users', [
            'LoggedUserInfo' => User::getCurrentUser()
        ]);
    }

    public function publications()
    {
        $types = PageType::all();
        $files = $this->getGallery('publications');

        return view('admin.publications', [
            'LoggedUserInfo' => User::getCurrentUser(),
            'files' => $files,
            'types' => $types
        ]);
    }

    public function objects()
    {
        $types = PageType::all();
        $classes = ObjectClass::all();
        $files = $this->getGallery('objects');

        return view('admin.objects', [
            'LoggedUserInfo' => User::getCurrentUser(),
            'files' => $files,
            'classes' => $classes,
            'types' => $types
        ]);
    }

    public function addImage(Request $request)
    {
        if ($file = $request->file('file')) 
        {
            $url = 'images\\'.$request->gallery_name;

             //saving file to temp folder
            $file->move(public_path("tmp"), $file->getClientOriginalName());

            //moving file to public
            File::move(public_path("tmp")."\\".$file->getClientOriginalName(), public_path($url)."\\".$file->getClientOriginalName());
                
            return Response()->json([
                "success" => true,
                "view" => view('ajax.gallery', ['files' => $this->getGallery($request->gallery_name), 'gallery_name' => $request->gallery_name])->render()
            ]);
    
        }
    
        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }
}
