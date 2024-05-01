<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuctionController extends Controller
{
    public function available(): View
    {
        $viewData = [];
        $viewData['title'] = 'Auctions - InteresThing';
        $viewData['subtitle'] = 'List of Auctions';
        $viewData['auctions'] = Auction::where('active', true)->get();

        return view('auction.available')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $user = Auth::user();
        $userProducts = $user->productsSelled()->where('auctioned', false)->get();
        $viewData = [];
        $viewData['title'] = 'Create auction';
        $viewData['userProducts'] = $userProducts;

        return view('auction.create')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);
        $viewData['title'] = $auction->getProduct()->getName().' - InteresThing';
        $viewData['subtitle'] = $auction->getProduct()->getName().' - Auction information';
        $viewData['auction'] = $auction;

        return view('auction.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Auction::validate($request);
        Auction::create([
            'limitDate' => $request->limitDate,
            'basePrice' => $request->basePrice,
            'productId' => $request->productId,
        ]);

        $product = Product::findOrFail($request->productId);
        $product->setAuctioned(true);
        $product->save();
        
        return back();
    }
}
