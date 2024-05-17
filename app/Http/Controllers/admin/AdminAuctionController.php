<?php
/**
 * Created by: Laura
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminProductController extends Controller
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
        $viewData['auctions'] = $auctions;

        return view('admin.auction.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Auction::validate($request);
        $user = Auth::user();

        Product::create([
            'limitDate' => $request->limitDate,
            'basePrice' => $request->basePrice,
            'active' => $request->active,
            'product' => $request->product,
        ]);

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Auctions - InteresThing';
        $viewData['subtitle'] = 'List of Auctions';
        $viewData['auctions'] = $auctions;

        return view('admin.auction.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($request->input('limitDate') != null) {
            $product->setlimitDate($request->input('limitDate'));

        }

        if ($request->input('basePrice') != null) {
            $product->setbasePrice($request->input('basePrice'));
        }

        if ($request->input('active') != null) {
            $product->setActive($request->input('active'));
        }

        if ($request->input('product') != null) {
            $product->setProduct($request->input('product'));
        }

        $product->save();

        return redirect()->route('admin.auction.index');
    }

    public function delete($id): RedirectResponse
    {
        Product::destroy($id);

        return back();
    }
}
