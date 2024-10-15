<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Species;
use App\Models\Image;

class GalleryRedListController extends Controller
{
    public function index() {
        $images = Image::all();

        return view('gallery.red_list', compact('images'));
    }
}