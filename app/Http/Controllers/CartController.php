<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Interfaces\Collect;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\Product;


class CartController extends Controller

{

public function index(Request $request): View

{

    $collectInterface = app(Collect::class);

    $cartProducts = $collectInterface->collectProducts($request);

    $viewData = [];

    $viewData['title'] = 'Cart - Online Store';

    $viewData['subtitle'] = 'Shopping Cart';

    $viewData['products'] = $products;

    $viewData['cartProducts'] = $cartProducts;

return view('cart.index')->with('viewData', $viewData);

}

public function add(string $id, Request $request): RedirectResponse

{

$cartProductData = $request->session()->get('cart_product_data');

$cartProductData[$id] = $id;

$request->session()->put('cart_product_data', $cartProductData);

return back();

}

public function removeAll(Request $request): RedirectResponse

{

$request->session()->forget('cart_product_data');

return back();

}

}