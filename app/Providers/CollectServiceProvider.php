<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Collect;

use App\Util\CollectProducts;

class CollectServiceProvider extends ServiceProvider

{

    public function getProductsToBuy(): void

    {

    $this->app->bind(Collect::class, function (){

    return new CollectProducts();

    });

}

}