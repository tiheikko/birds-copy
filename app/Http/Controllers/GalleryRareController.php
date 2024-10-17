<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Species;
use App\Models\Image;

class GalleryRareController extends Controller
{
    public function index() {
        $images = Image::all();

        return view('gallery.rare', compact('images'));
    }
}