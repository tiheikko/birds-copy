<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;

use Illuminate\Http\Request;

class GenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genera = Genus::orderBy('name')->get();

        return view('genus.index', compact('genera'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();
        $genera = Genus::orderBy('name')->get();

        return view('genus.create', compact('orders', 'families', 'genera'));
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
            'family_id' => 'int'
        ]);

        Genus::firstOrCreate($data);

        return redirect()->route('genus.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genus $genus)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genus $genus)
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();

        return view('genus.edit', compact('orders', 'families', 'genus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genus $genus)
    {
        $data = request()->validate([
            'name' => 'string',
            'latin_name' => 'string',
            'order_id' => 'int',
            'family_id' => 'int',
        ]);

        $genus->update($data);

        return redirect()->route('genus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genus $genus)
    {
        $genus->delete();

        return redirect()->route('genus.index');
    }
}
