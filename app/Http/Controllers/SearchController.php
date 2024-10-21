<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;

class SearchController extends Controller
{
    public function search(Request $request) {

        $query = $request->search;

        $search = '%' . $request->search . '%';

        $results = Species::whereHas('order', function($query) use ($search) {
            $query->where('name', 'like', $search)
                    ->orWhere('latin_name', 'like', $search); 
        })
        ->orwhereHas('family', function($query) use ($search) {
            $query->where('name', 'like', $search)
                    ->orWhere('latin_name', 'like', $search);; 
        })
        ->orwhereHas('genus', function($query) use ($search) {
            $query->where('name', 'like', $search)
                    ->orWhere('latin_name', 'like', $search);; 
        })
        ->orWhere('name', 'like', $search)
        ->orWhere('latin_name', 'like', $search)
        ->get();

        return view('search.index', compact('results', 'query'));
    }
}
