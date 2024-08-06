<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function album() {
        $names = Photo::NAMES;
        $titles = Photo::TITLES;

        $photos = [];
        for ($i = 0; $i < count($names); $i++) {
            $photos[] = [
                'file_name' => $names[$i],
                'caption' => $titles[$i],
            ];
        }

        return view('album', compact('photos'));
    }
}
