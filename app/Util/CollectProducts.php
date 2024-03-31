<?php

use App\Interfaces\Collect;

use Illuminate\Http\Request;

use App\Models\Product;

class CollectProducts implements Collect
{

    public function collectProducts(Request $request): array

    {

    $products = Product::All();

    $cartProducts = [];

    $cartProductData = $request->session()->get('cart_product_data'); 

    if ($cartProductData) 
    {

        foreach ($products as $product) 
        {
            $productId = $product->getId();

            if (in_array($productId,array_keys($cartProductData))) 
            {

                $cartProducts[$productId] = $product;

            }

        }

    }

    return $cartProducts;
    }
}