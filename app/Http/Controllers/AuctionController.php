<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function available(Request $request): View
    {
        $search = $request->input('search');
        $query = Auction::where('active', true);

        if ($search) {
            $query->whereHas('product', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
        }

        $auctions = $query->get();

        $viewData = [];
        $viewData['title'] = __('Auction.auctions_title');
        $viewData['subtitle'] = __('Auction.auctions_subtitle');
        $viewData['auctions'] = $auctions;

        return view('auction.available')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $user = Auth::user();
        $userProducts = $user->productsSelled()->where('auctioned', false)->get();
        $viewData = [];
        $viewData['title'] = __('Auction.create_auction_title');
        $viewData['userProducts'] = $userProducts;

        return view('auction.create')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);
        $productName = $auction->getProduct()->getName();
        $viewData['title'] = __('Auction.auction_info_title', ['productName' => $productName]);
        $viewData['subtitle'] = __('Auction.auction_info_subtitle', ['productName' => $productName]);
        $viewData['auction'] = $auction;

        return view('auction.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Auction::validate($request);
        $product = Product::findOrFail($request->productId);
        Auction::create([
            'limitDate' => $request->limitDate,
            'productId' => $request->productId,
            'basePrice' => $product->getPrice(),
        ]);

        $product = Product::findOrFail($request->productId);
        $product->setAuctioned(true);
        $product->save();

        return back()->with('success', __('Auction.auction_created_success'));
    }
}
