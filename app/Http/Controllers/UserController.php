<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function profile(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - interesthing';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('user.profile')->with('viewData', $viewData);
    }

    public function showProductsBuyed(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsBuyed();
        $viewData['title'] = 'Products buyed - InteresThing';
        $viewData['products'] = $products;

        return view('user.products.buyed')->with('viewData', $viewData);
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

        $viewData['title'] = 'Products selled - InteresThing';
        $viewData['products'] = $products;

        return view('user.products.selled')->with('viewData', $viewData);
    }

    public function showProductsOnSale(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsSelled;

        foreach ($products as $key => $product) {

            if ($product->getBuyer() != null || $product->getAuctioned()) {
                unset($products[$key]);
            }

        }

        $viewData['title'] = 'You products yet to sell - InteresThing';
        $viewData['products'] = $products;

        return view('user.products.toSell')->with('viewData', $viewData);
    }

    /*
    public function showAuctions(): View
    {
        $user = Auth::user();
        $viewData = [];
        $products = $user->getProductsSelled;
        $productIds = [];

        foreach($products as $key => $product){

            if ($product->getAuctioned()){
                $productIds[] = $product->getId();
            }
        }


        $auctions = Auction::whereIn('productId', $productsIds)->get();
        $viewData['title'] = 'Your products yet to sell - InteresThing';
        $viewData['auctions'] = $auctions;

        return view('user.auctions')->with('viewData', $viewData);
    }

    public function showOffers(): View
    {
        $user = Auth::user();
        $viewData = [];
        $offers = $user->getOffers();
        $viewData['title'] = 'Your offers - InteresThing';
        $viewData['offers'] = $offers;

        return view('user.offers')->with('viewData', $viewData);
    }

    public function showOrders(): View
    {
        $user = Auth::user();
        $viewData = [];
        $orders = $user->getOrders();
        $viewData['title'] = 'Your orders - InteresThing';
        $viewData['orders'] = $orders;

        return view('user.orders')->with('viewData', $viewData);
    }

*/

}
