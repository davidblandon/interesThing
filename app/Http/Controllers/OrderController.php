<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function list(): View
    {
        $viewData = [];

        $viewData['title'] = 'Orders - Online Store';

        $viewData['subtitle'] = 'List of Orders';

        $viewData['orders'] = Order::all();

        return view('orders.list')->with('viewData', $viewData);

    }

    /**
     * This method associates the new created order with its products
     */
    public function associateProducts(array $products): void
    {

        foreach ($products as $product) {
            $product->setOrder($this->getId());
            $product->setSold(true);
        }

    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $collectInterface = app(Collect::class);

        $cartProducts = $collectInterface->collectProducts($request);

        $sum = 0;

        foreach ($cartProducts as $product) {
            $sum = $sum + $product->getPrice();
        }

        $order = Order::create([

            'total' => $sum,

            'user' => $user->getId(),

        ]);

        $order->associateProducts($cartProducts);

    }

    public function show(int $id): View
    {

        $viewData = [];

        $order = Order::findOrFail($id);

        $viewData['title'] = $order->getId().' - Online Store';

        $viewData['subtitle'] = $order->getName().' - Auction information';

        $viewData['order'] = $order;

        return view('orders.show')->with('viewData', $viewData);
    }
}
