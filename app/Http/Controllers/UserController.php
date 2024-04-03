<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {

        $viewData['title'] = 'Home Page - Online Store';

        return view('home.index')->with('viewData', $viewData);

    }

    public function admin(): View
    {
        $user = Auth::user();

        if ($user->getAdmin()) {

            $products = Product::all();
            $auctions = Auction::all();
            $viewData['title'] = 'Pofile Page - Online Store';
            $viewData['products'] = $products;
            $viewData['auctions'] = $auctions;

            return view('admin')->with('viewData', $viewData);
        } 
        else 
        {
            return redirect()->route('home.index');
        }

    }

    public function profile(): View
    {
        $user = Auth::user();
        $productsId = $user->products();
        $auctionsId = $user->auctions();
        $ordersId = $user->orders();
        $products = [];
        $auctions = [];
        $orders = [];

        foreach($ordersId as $order){
            $new = Order::findOrFail($order);
            $products[] = $new;

        }

        foreach($auctionsId as $auction){
            $new = Auction::findOrFail($auction);
            $auctions[] = $new;

        }

        foreach($productsId as $product){
            $new = Product::findOrFail($product);
            $products[] = $new;

        }
        
        $viewData = [];
        $viewData['title'] = 'Pofile Page - Online Store';
        $viewData['subtitle'] = $user->getName().' - information';
        $viewData['user'] = $user;
        $viewData['products'] = $products;
        $viewData['auctions'] = $auctions;
        $viewData['orders'] = $orders;
        echo $orders;
        return view('user.profile')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $auction = User::findOrFail($id);
        $auction->delete();

        return redirect()->route('auction.list')->with('success', 'Auction deleted successfully');
    }
}
