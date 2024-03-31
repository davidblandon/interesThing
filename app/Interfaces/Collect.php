<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

use Illuminate\Models\Product;

interface Collect {

public function collect(Request $request): array;


}