<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Collect
{
    public function collect(Request $request): array;
}
