<?php

namespace App\Observers;

use App\Models\BirdsStatistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class BirdsStatisticsObserver
{
    /**
     * Handle the BirdsStatistic "created" event.
     */
    public function created(BirdsStatistic $birdsStatistic): void
    {
        $oneWeekAgo = Carbon::now()->subDays(7);

        $otherUsers = BirdsStatistic::where('bird_id', $birdsStatistic->bird_id)
            ->where('user_id', '!=', $birdsStatistic->user_id)
            ->where('date_seen', '>', $oneWeekAgo)
            ->exists();

        $otherUsersSaw = BirdsStatistic::where('bird_id', $birdsStatistic->bird_id)
            ->where('user_id', '!=', $birdsStatistic->user_id)
            ->exists();

        if (!$otherUsers and $otherUsersSaw) {
            $users = User::where('id', '!=', $birdsStatistic->user_id)->get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($birdsStatistic));
            }
        }
    }

    /**
     * Handle the BirdsStatistic "updated" event.
     */
    public function updated(BirdsStatistic $birdsStatistic): void
    {
        //
    }

    /**
     * Handle the BirdsStatistic "deleted" event.
     */
    public function deleted(BirdsStatistic $birdsStatistic): void
    {
        //
    }

    /**
     * Handle the BirdsStatistic "restored" event.
     */
    public function restored(BirdsStatistic $birdsStatistic): void
    {
        //
    }

    /**
     * Handle the BirdsStatistic "force deleted" event.
     */
    public function forceDeleted(BirdsStatistic $birdsStatistic): void
    {
        //
    }
}
