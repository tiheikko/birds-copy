<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use App\Models\BirdsStatistic;

use App\Observers\BirdsStatisticsObserver;

use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CommentRepository::class);

        $this->app->bind(CommentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        BirdsStatistic::observe(BirdsStatisticsObserver::class);
    }
}
