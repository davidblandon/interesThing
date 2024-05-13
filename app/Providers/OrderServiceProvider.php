<?php
/**
 * Created by: Juan Martín Espitia
 */


namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\OrderDownload;
use App\Util\OrderPDFDownload;
use App\Util\OrderExcellDownload;

class OrderServiceProvider extends ServiceProvider

{

public function register(): void

{

    $this->app->bind(OrderDownload::class, function ($app, $params){
        $download = $params['download'];
        if($download == 'PDF'){
            return new OrderPDFDownload;
        }
        elseif($download == 'Excell'){
            return new OrderExcellDownload;
        }

    });

  





}  
}
