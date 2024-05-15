<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;

use App\Interfaces\OrderDownload;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderPDFDownload implements OrderDownload
{
    public function download(Request $request, array $viewData): Response
    {
        $pdf = app('dompdf.wrapper');
        $pdf = \Pdf::loadView('order.pdf', $viewData);

        return $pdf->download();

    }
}
