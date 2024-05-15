<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;

use App\Exports\OrderExport;
use App\Interfaces\OrderDownload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class OrderExcellDownload implements OrderDownload
{
    public function download(Request $request, array $viewData): Response
    {

        $products = $viewData['order']->getProducts();
        $excel = Excel::download(new OrderExport($viewData['order']), 'order.xlsx');

        return $excel;

    }
}
