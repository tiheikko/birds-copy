<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Image;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();

        return view('image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();
        $species = Species::orderBy('name')->get();

        return view('image.create', compact('species', 'orders', 'families', 'genera'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        function checkPath($path) {
            if(!File::exists(public_path() . $path)) {
                File::makeDirectory(public_path() . $path);
            } 
        }

        $order = Order::find(request()->order_id)->latin_name;
        $family = Family::find(request()->family_id)->latin_name;
        $genus = Genus::find(request()->genus_id)->latin_name;
        $species = Species::find(request()->species_id)->latin_name;

        $path = '/images/' . $order . '/';
        checkPath($path);
        $path .= $family . '/';
        checkPath($path);
        $path .= $genus . '/';
        checkPath($path);
        $path .= $species . '/';
        checkPath($path);


        $img = request()->file('img');
        $img_name = $img->getClientOriginalName();

        $img->move(public_path() . $path, $img_name);

        Image::create([
            'species_id' => request()->species_id,
            'img_url' => $path . $img_name,
        ]);

        return redirect()->route('image.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();
        $species = Species::orderBy('name')->get();

        return view('image.edit', compact('image', 'orders', 'families', 'genera', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $order = Order::find(request()->order_id)->latin_name;
        $family = Family::find(request()->family_id)->latin_name;
        $genus = Genus::find(request()->genus_id)->latin_name;
        $species = Species::find(request()->species_id)->latin_name;

        $path = '/images/' . $order . '/' . $family . '/' . $genus . '/';

        $new_img = request()->file('img');

        if($new_img == null) {
            $path = $image->img_url;
        } else {
            $new_img->move(public_path() . $path, $new_img->getClientOriginalName());
            unlink(public_path() . $image->img_url);
            $path .= $new_img->getClientOriginalName();
        }

        $image->update([
            'species_id' => request()->species_id,
            'img_url' => $path
        ]);

        return redirect()->route('image.edit', $image->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {

        unlink(public_path() . $image->img_url);

        $image->delete();

        return redirect()->route('image.index');
    }
}
