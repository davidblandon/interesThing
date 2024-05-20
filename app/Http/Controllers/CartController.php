<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::where('auctioned', false)->get();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');
        $total = 0;

        if ($cartProductData) {
            foreach ($products as $product) {
                $total += $product->getPrice();

                if (in_array($product->getId(), array_keys($cartProductData))) {
                    $cartProducts[$product->getId()] = $product;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = __('CartController.cart_title');
        $viewData['cartProducts'] = $cartProducts;
        $viewData['total'] = $total;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);

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
