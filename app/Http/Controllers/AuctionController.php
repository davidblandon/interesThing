<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Auctions - Online Store';
        $viewData['subtitle'] = 'List of Auctions';
        $viewData['auctions'] = Auction::all();

        return view('auction.list')->with('viewData', $viewData);

    }

    public function create(): View
    {

        $viewData = [];
        $user = Auth::user();
        $products = $user->products();
        $viewData['title'] = 'Create auction';
        $viewData['products'] = $products;

        return view('auction.create')->with('viewData', $viewData);

    }

    public function save(Request $request): RedirectResponse
    {

        $user = Auth::user();
        Auction::validate($request);

        Auction::create([

            'name' => $request->product->getName(),

            'limitDate' => $request->limitDate,

            'basePrice' => $request->product->getPrice(),

            'aucter' => $user->getId(),

            'product' => $product->getId(),

        ]);

        $product->setAuctioned(true);
        Session::flash('success', 'DONE! auction created');

        return back();
    }

    public function show(int $id): View
    {

        $viewData = [];
        $auction = Auction::findOrFail($id);
        $viewData['title'] = $auction->getId().' - Online Store';
        $viewData['subtitle'] = $auction->getName().' - Auction information';
        $viewData['auction'] = $auction;

        return view('auction.show')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $auction = Auction::findOrFail($id);
        $auction->delete();

        return redirect()->route('auction.list')->with('success', 'Auction deleted successfully');
    }
}
