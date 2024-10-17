<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Family;

use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('name')->get();

        return view('family.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::orderBy('name')->get();
        $families = Family::orderBy('name')->get();

        return view('family.create', compact('orders', 'families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'string',
            'latin_name' => 'string',
            'order_id' => 'int'
        ]);

        Family::firstOrCreate($data);

        return redirect()->route('family.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        $orders = Order::orderBy('name')->get();
        return view('family.edit', compact('family', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $data = request()->validate([
            'name' => 'string',
            'latin_name' => 'string',
            'order_id' => 'int'
        ]);

        $family->update($data);

        return redirect()->route('family.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();

        return redirect()->route('family.index');
    }
}
