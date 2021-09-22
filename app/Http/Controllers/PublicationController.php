<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;
use App\Models\PublicationPart;

class PublicationController extends Controller
{
    public function save(Request $request)
    {
        $publication = $request->publication;

        $main = ['title' => $publication[0]['value'], 'access_level' => $publication[1]['value']];
        $parts = $publication[2]['value'];

        //adding publication
        $new_publication = new Publication($main);
        $new_publication->save();

        //adding parts
        foreach($parts as $index => $part)
        {
            //addition values
            $part['order'] = $index;
            $part['publication_id'] = $new_publication->id;
            $part['type_id'] = $part['partType'];
            $part['access_level'] = $part['access'];
            
            unset($part['partType']);
            unset($part['access']);

            PublicationPart::create($part);
        }

        return response()->json(['success' => true]);
    }
}
