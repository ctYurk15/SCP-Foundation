<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjectClass;
use App\Models\Item;

class DBTestController extends Controller
{
    public function db_object_test(Request $request)
    {
        $classes = ObjectClass::all();
        $items = Item::all();

        $access = $request->get('access') == NULL ? 1 : $request->get('access');

        return view('dbtest.objects', [
            "classes" => $classes,
            "items" => $items,
            "access" => $access
        ]);
    }
}
