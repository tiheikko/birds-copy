<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\BirdsStatistic;

class ProfileStatisticsController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $records = BirdsStatistic::where('user_id', $user_id)->get();

        $sorted_birds = collect($records)
            ->groupBy('bird_id')
            ->map(function ($group) {
                return [
                    'last_seen' => $group->sortByDesc('date_seen')->first(),
                    'count' => $group->count(),
                    'bird' => $group->first()->species->name,
                ];
            })
            ->values();

        return view('profile.birds_statistics', compact('sorted_birds'));
    }

}
