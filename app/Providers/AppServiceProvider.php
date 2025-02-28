<?php

namespace App\Providers;

use App\Models\Download;
use App\Models\Info;
use App\Models\Weblink;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'info' => Info::class,
            'download' => Download::class,
            'WEBLINK' => Weblink::class
        ]);
    }
}
