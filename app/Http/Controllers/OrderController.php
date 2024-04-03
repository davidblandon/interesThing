<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Interfaces\Collect;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use PDF;

class OrderController extends Controller
{
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Orders - Online Store';
        $viewData['subtitle'] = 'List of Orders';
        $user = Auth::user();
        $viewData['orders'] = $user->orders();

        return view('orders.list')->with('viewData', $viewData);
    }

    /**
     * This method associates the new created order with its products
     */
    public function associateProducts(array $products, Order $order): void
    {
        foreach ($products as $product) {
            $product->setOrder($order->getId());
            $product->setSold(true);
        }

    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $collectInterface = app(Collect::class);
        $cartProducts = $collectInterface->collect($request);
        $sum = 0;

        foreach ($cartProducts as $product) {
            $sum = $sum + $product->getPrice();
        }

        $order = Order::create([

            'total' => $sum,

            'user' => $user->getId(),

        ]);

        $this->associateProducts($cartProducts,$order);

        Session::flash('message', 'The order has been created succefully');


        return redirect()->route('home.index');

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

    public function generatePDF(int $id): Response
    {
        
        $order = Order::findOrFail($id);
        $user = Auth::user();

        $orderData = [
            'User' => $user->getName(),
            'order ID' => $order->getId(),

        ];

        $products = $order->products();
        $formattedProducts = [];

        foreach ($products as $product) {
            $formattedProducts[] = [
                'name' => $product->getName(),

                'price' => '$' .$product->getPrice(),
            ];
        }

        $total = $order->getTotal();

        $pdf = PDF::loadView('order', compact('orderData', 'formattedProducts', 'total'));

        return $pdf->download('order.pdf');
    }

    

}
