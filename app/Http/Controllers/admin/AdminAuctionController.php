<?php
/**
 * Created by: Laura
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuctionController extends Controller
{
    /*** $this->attributes['limitDate'] - date - contains the limit of the auction
     * $this->attributes['basePrice'] - int - contains the base price of the auction
     * $this->attributes['active'] - bool - checks if the auction is active
     * $this->product - Product - contains the product associeted to the auction */
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Auctions - InteresThing';
        $viewData['subtitle'] = 'List of Auctions';
        $auctions = Auction::where('active', true)->get();
        $viewData['auctions'] = $auctions;
        $products = Product::where('auctioned', false)
            ->where('buyerId', null)
            ->get();

        $viewData['products'] = $products;

        return view('admin.auction.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Auction::validate($request);

        $product = Product::findOrFail($request->productId);

        Auction::create([
            'limitDate' => $request->limitDate,
            'productId' => $request->productId,
            'basePrice' => $product->getPrice(),
        ]);

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Auctions - InteresThing';
        $viewData['subtitle'] = 'List of Auctions';
        $auction = Auction::findOrFail($id);
        $viewData['auction'] = $auction;
        $products = Product::where('auctioned', false)
            ->where('buyerId', null)
            ->get();
        $viewData['products'] = $products;

        return view('admin.auction.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $auction = Auction::findOrFail($id);

        if ($request->input('limitDate') != null) {
            $auction->setlimitDate($request->input('limitDate'));

        }

        if ($request->input('basePrice') != null) {
            $auction->setbasePrice($request->input('basePrice'));
        }

        if ($request->input('active') != null) {
            $auction->setActive($request->input('active'));
        }

        if ($request->input('product') != null) {
            $auction->setProduct($request->input('product'));
        }

        $auction->save();

        return redirect()->route('admin.auction.index');
    }

    public function delete($id): RedirectResponse
    {
        Product::destroy($id);

        return back();
    }
}
