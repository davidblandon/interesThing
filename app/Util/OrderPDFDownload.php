<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;
use App\Interfaces\OrderDownload;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Barryvdh\Snappy\Facades\SnappyPdf;

class OrderPDFDownload implements OrderDownload

{

public function download(Request $request, Order $order): BinaryFileResponse

{
/** 
*    $products = $order->getProducts();
*    $html = view::make('order.PDF', [
*       'products' => $products,
*        'orderId' => $order->getId(),
*       'total' => $order->getTotal(),
*    ])->render();

*    $response = new BinaryFileResponse($pdf);
*    $response->headers->set('Content-Disposition', 'attachment; filename="order.pdf"');

*    return $response;
*/

}

}

