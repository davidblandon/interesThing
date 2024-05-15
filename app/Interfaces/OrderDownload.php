<?php

namespace App\Interfaces;

use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface OrderDownload
{
    public function download(Request $request, array $viewData): Response;
}
