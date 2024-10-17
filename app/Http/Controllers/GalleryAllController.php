<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Image;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;

use Illuminate\Support\Facades\Hash;

class GalleryAllController extends Controller
{
    public function index() {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();
	

        $images = Image::paginate(20);
	//$images = Image::all();

        //$password = Hash::make('12345');
        return view('gallery.index', compact('images', 'orders', 'families', 'genera'));
    }
}