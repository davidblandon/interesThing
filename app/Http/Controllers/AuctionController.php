<?php

/**
 * Created by: David Blandón Román
 */

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
        $viewData['title'] = 'Auctions - InteresThing';
        $viewData['subtitle'] = 'List of Auctions';

        $viewData['auctions'] = $auctions;

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
        $viewData['title'] = $auctions->getProduct()->getName().' - InteresThing';
        $viewData['subtitle'] = $auctions->getProduct()->getName().' - Auction information';
        $viewData['auction'] = $auctions;

        return view('auction.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Auction::validate($request);
        $product= Product::findOrFail($request->productId);
        Auction::create([
            'limitDate' => $request->limitDate,
            'productId' => $request->productId,
            'basePrice' => $product ->getPrice(),
        ]);

        $product = Product::findOrFail($request->productId);
        
        $product->setAuctioned(true);
        $product->save();

        return back();
    }
}
