<?php

namespace App\Providers;

use App\Interfaces\Collect;
use App\Util\CollectProducts;
use Illuminate\Support\ServiceProvider;

class CollectServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(Collect::class, function () {

            return new CollectProducts();

        });

    }
}
