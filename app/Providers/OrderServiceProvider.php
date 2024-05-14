<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Providers;

use App\Interfaces\OrderDownload;
use App\Util\OrderExcellDownload;
use App\Util\OrderPDFDownload;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(OrderDownload::class, function ($app, $params) {
            $download = $params['download'];
            if ($download == 'PDF') {
                return new OrderPDFDownload;
            } elseif ($download == 'Excell') {
                return new OrderExcellDownload;
            }

        });

    }
}
