<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;
use App\Interfaces\OrderDownload;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Maatwebsite\Excel\Facades\Excel; 

class OrderExcellDownload implements OrderDownload

{

public function download(Request $request, Order $order): BinaryFileResponse

{
/** 
*    $products = $order->getProducts();
*    $excel = Excel::download(new ProductsExport($products,$order), 'order.xlsx');
*    $response = new BinaryFileResponse($excel->getFile());
*    $response->headers->set('Content-Disposition', 'attachment; filename="order.xlsx"');

*    return $response;

*/
}

}

