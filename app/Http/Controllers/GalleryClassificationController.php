<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;

class GalleryClassificationController extends Controller
{
    public function index() {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();

        return view('gallery_classification.index', compact('orders', 'families', 'genera'));
    }


    public function order(Request $request) {
        $name = Order::where('id', '=', $request->order)->value('name');
        $latin_name = Order::where('id', '=', $request->order)->value('latin_name');

        $species = Species::where('order_id', '=', $request->order)->get();
       
        return view('gallery_classification.result', compact('species', 'name', 'latin_name'));
    }

    public function family(Request $request) {
        $name = Family::where('id', '=', $request->family)->value('name');
        $latin_name = Family::where('id', '=', $request->family)->value('latin_name');

        $species = Species::where('family_id', '=', $request->family)->get();
       
        return view('gallery_classification.result', compact('species', 'name', 'latin_name'));
    }

    public function genus(Request $request) {
        $name = Genus::where('id', '=', $request->genus)->value('name');
        $latin_name = Genus::where('id', '=', $request->genus)->value('latin_name');

        $species = Species::where('genus_id', '=', $request->genus)->get();

       
        return view('gallery_classification.result', compact('species', 'name', 'latin_name'));
    }
}
