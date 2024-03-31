<?php

/**
 * Created by: Juan Martín Espitia
 */


namespace App\Http\Controllers;

use Illuminate\View\View;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{



 public function list(): View
 {
    $viewData = [];

    $viewData["title"] = "Orders - Online Store";

    $viewData["subtitle"] = "List of Orders";

    $viewData["orders"] = Order::all();

    return view('auction.list')->with("viewData", $viewData);
   

 }

 
/**
 * This method associates the new created order with its products
 */
 public function associateProducts(array $products): void

 {

    foreach ($products as $product)
    {
        $product -> setOrder($this->getId());
        $product -> setSold(True);
    }


}   
 

 public function save(Request $request): RedirectResponse

 {
    $user = Auth::user();

    $collectInterface = app(Collect::class);

    $cartProducts = $collectInterface->collectProducts($request);

    $sum = 0;

    foreach ($cartProducts as $product)
    {
        $sum = $sum + $product->getPrice();
    }

    $order = Order::create([

        'total' => $sum,

        'user' => $user->getId(),


    ]);

    $order ->associateProducts($cartProducts);


}   



public function show(int $id): View

 {

    $viewData = [];

    $order = Order::findOrFail($id);

    $viewData["title"] = $order -> getId()." - Online Store";
    
    $viewData["subtitle"] = $order -> getName()." - Auction information";

    $viewData["order"] = $order;


    return view('order.show')->with("viewData", $viewData);
 }


 



}