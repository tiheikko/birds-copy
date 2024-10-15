<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;

use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species = Species::orderBy('name')->get();

        return view('species.index', compact('species'));
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

        return view('species.create', compact('orders', 'families', 'genera', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'string',
            'latin_name' => 'string',
            'order_id' => 'int',
            'family_id' => 'int',
            'genus_id' => 'int',
            'rare' => 'boolean',
            'red_list' => 'boolean'
        ]);

        Species::firstOrCreate($data);

        return redirect()->route('species.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Species $species)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Species $species)
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();


        return view('species.edit', compact('orders', 'families', 'genera', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Species $species)
    {
        $data = request()->validate([
            'name' => 'string',
            'latin_name' => 'string',
            'order_id' => 'int',
            'family_id' => 'int',
            'genus_id' => 'int',
            'rare' => 'boolean',
            'red_list' => 'boolean'
        ]);


        $species->update($data);

        return redirect()->route('species.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Species $species)
    {
        $species->delete();

        return redirect()->route('species.index');
    }
}
