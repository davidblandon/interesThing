<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Auction;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(): View
    {
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = __('User.profile_title');
        $viewData['user'] = $user;

        return view('user.profile')->with('viewData', $viewData);
    }

    public function showProductsBuyed(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsBuyed();
        $viewData['title'] = __('User.products_buyed_title');
        $viewData['products'] = $products;

        return view('user.buyed')->with('viewData', $viewData);
    }

    public function showProductsSelled(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsSelled();

        foreach ($products as $key => $product) {
            if ($product->getBuyer() == null || $product->getAuctioned()) {
                unset($products[$key]);
            }
        }

        $viewData['title'] = __('User.products_selled_title');
        $viewData['products'] = $products;

        return view('user.selled')->with('viewData', $viewData);
    }

    public function showProductsOnSale(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsSelled();

        foreach ($products as $key => $product) {
            if ($product->getBuyer() != null || $product->getAuctioned()) {
                unset($products[$key]);
            }
        }

        $viewData['title'] = __('UserController.products_to_sell_title');
        $viewData['products'] = $products;

        return view('user.toSell')->with('viewData', $viewData);
    }

    public function showAuctions(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsSelled();
        $productIds = [];

        foreach ($products as $product) {
            if ($product->getAuctioned()) {
                $productIds[] = $product->getId();
            }
        }

        $auctions = Auction::whereIn('productId', $productIds)->get();
        $viewData['title'] = __('UserController.auctions_title');
        $viewData['auctions'] = $auctions;

        return view('user.auctions')->with('viewData', $viewData);
    }

    public function showOffers(): View
    {
        $user = Auth::user();
        $viewData = [];
        $offers = $user->getOffers();
        # dd($offers);
        $viewData['title'] = __('User.offers_title');
        $viewData['offers'] = $offers;

        return view('user.offers')->with('viewData', $viewData);
    }

    public function showOrders(): View
    {
        $user = Auth::user();
        $viewData = [];
        $orders = $user->getOrders();
        $viewData['title'] = __('User.orders_title');
        $viewData['orders'] = $orders;

        return view('user.orders')->with('viewData', $viewData);
    }
}
