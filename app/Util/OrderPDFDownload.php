<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Interfaces\OrderDownload;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class OrderPDFDownload implements OrderDownload
{
    public function download(Request $request, array $viewData): Response
    {
        $pdf = app('dompdf.wrapper');
        $pdf = \Pdf::loadView('order.pdf',$viewData);
        return $pdf->download();


   }
}
