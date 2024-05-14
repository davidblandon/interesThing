<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;

use App\Interfaces\OrderDownload;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
