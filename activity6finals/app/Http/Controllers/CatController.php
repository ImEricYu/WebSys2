<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatController extends Controller
{
    //
    public function getCatImage()
    {
        $cat = Http::get("https://api.thecatapi.com/v1/images/search");

        $catImg = $cat[0]['url'];

        if ($cat->successful()) {
            return view('welcome', compact('catImg'));
        } else {
            return view('welcome', ['error' => 'Could not catch a cat']);
        }
    }
}
