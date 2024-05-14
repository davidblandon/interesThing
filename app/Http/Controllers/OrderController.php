<?php

/**
 * Created by: Juan MArtín Espitia
 */

namespace App\Http\Controllers;

use App\Interfaces\OrderDownload;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function download(Request $request, int $id): void
    {
        $download = $request->get('download');
        $order = Order::findOrFail($id);
        $downloadInterface = app(OrderDownload::class, ['download' => $download]);
        $downloadInterface->download($request, $order);

    }

    public function show(int $id)
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData['title'] = ' Order - InteresThing';
        $viewData['order'] = $order;

        return view('order.show')->with('viewData', $viewData);
    }

    public function create(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $products = Product::where('auctioned', false)->get();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');

        if ($cartProductData) {

            foreach ($products as $product) {

                if (in_array($product->getId(), array_keys($cartProductData))) {

                    $cartProducts[$product->getId()] = $product;

                }

            }

        }

        $total = $this->calculateTotal($cartProducts);
        $order = new Order([
            'total' => $total,
            'userId' => $user->getId(),
        ]);

        $order->save();
        $this->asignProducts($cartProducts, $order->getId());
        $user->setBalance($user->getBalance() - $total);
        $user->save();
        $request->session()->forget('cart_product_data');

        return redirect()->route('order.show', ['id' => $order->getId()]);

    }

    public function calculateTotal(array $products): int
    {
        $total = 0;

        foreach ($products as $product) {
            $total = $total + $product->getPrice();
        }

        return $total;

    }

    public function asignProducts(array $products, int $id): void
    {
        $user = Auth::user();

        foreach ($products as $product) {
            $product->setOrderId($id);
            $product->setBuyerId($user->getId());
            $product->save();

        }
    }
}