<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemPagePart;

class ObjectsController extends Controller
{
    public function save(Request $request)
    {
        $object = $request->object;

        $main = [   
                    'number' => $object[0]['value'], 
                    'name' => $object[1]['value'], 
                    'class_id' => $object[2]['value'], 
                    'photo' => $object[3]['value'], 
                    'access_level' => $object[4]['value']
                ];
        $parts = $object[5]['value'];

        //adding publication
        $new_object = new Item($main);
        $new_object->save();

        //adding parts
        foreach($parts as $index => $part)
        {
            //addition values
            $part['order'] = $index;
            $part['object_id'] = $new_object->id;
            $part['type_id'] = $part['partType'];
            $part['access_level'] = $part['access'];
            
            unset($part['partType']);
            unset($part['access']);

            ItemPagePart::create($part);
        }

        return response()->json(["success" => true]);
    }
}
