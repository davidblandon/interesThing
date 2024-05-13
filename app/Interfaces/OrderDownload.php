<?php

namespace App\Interfaces;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface OrderDownload {

public function download(Request $request, Order $order): BinaryFileResponse;

}