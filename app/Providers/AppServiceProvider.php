<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            $categories = [];
            if (Schema::hasTable('categories')) {
                $categories = Category::query()
                    ->with(['children' => function ($query) {
                        $query->where('active', true);
                    }])
                    ->whereNull('parent_id')
                    ->where('active', true)
                    ->get();
            }

            View::composer('*', function ($view) use ($categories) {
                $view->with('categories', $categories);
            });
        }
    }
}
