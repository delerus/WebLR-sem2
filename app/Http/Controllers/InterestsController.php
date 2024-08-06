<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interests;

class InterestsController extends Controller
{
    public function interestsList() {
        $ids = Interests::IDS;
        $names = Interests::NAMES;
        $descriptions = Interests::DESCRIPTIONS;
        $images = INTERESTS::IMAGES;

        $photos = [];
        for ($i = 0; $i < count($ids); $i++) {
            $interests[] = [
                'id' => $ids[$i],
                'name' => $names[$i],
                'desc' => $descriptions[$i],
                'img' => $images[$i]
            ];
        }

        return view('interests', compact('interests'));
    }
}
