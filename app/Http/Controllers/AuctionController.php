<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\User;
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
        $viewData['products'] = Product::where('auctioned', true)->get();
        
        return view('auction.list')->with('viewData', $viewData);

    }

    public function create(): View
    {

        $viewData = [];
        $user = Auth::user();
        $products = $user->products;
        $viewData['title'] = 'Create auction';
        $viewData['products'] = $products;
        

        return view('auction.create')->with('viewData', $viewData);

    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Auction::validate($request);

        Auction::create([

            'name' => Product::findOrFail($request->product)->getName(),

            'limitDate' => $request->limitDate,

            'basePrice' => Product::findOrFail($request->product)->getPrice(),

            'aucter' => $user->getId(),

            'product' => $request->product,

        ]);

        $product = Product::findOrFail($request->product);
        $product->setAuctioned(True);
        $product->save();
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
        $product = Product::findOrFail($auction->product);
        $viewData['product'] = $product;
        $viewData['seller'] = User::findOrFail($product->seller)->getName();

        return view('auction.show')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $auction = Auction::findOrFail($id);
        $product = Product::findOrFail($auction->product);
        $product->delete();
        $auction->delete();

        return Redirect::route('user.admin');
    }

    public function name(Request $request): View
    {
        
        $viewData = [];

        $request->validate([
            'name' => 'required'
        ]);

        $searchTerm = $request->input('name');
        $auctions = Auction::where('name', 'like', '%' . $searchTerm . '%')->get();
        $viewData['auctions'] = $auctions;

      return view('auction.name')->with('viewData', $viewData);
    }

    
}
