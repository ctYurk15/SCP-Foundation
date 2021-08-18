<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class MainController extends Controller
{
    public function objects(Request $request)
    {
        $objects = Item::all();

        $access = $request->get('access') == NULL ? 1 : $request->get('access');

        return view('main.objects_list', [
            "objects" => $objects,
            "access" => $access
        ]);
    }

    public function object($number)
    {
        $object = Item::where('number', $number)->first();

        return view("main.object", [
            "object" => $object,
            "access" => 4
        ]);
    }
}
