<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function create(int $auctionId): View
    {
        $viewData = [];
        $viewData['title'] = __('Offer.create_offer_title');
        $viewData['auctionId'] = $auctionId;

        return view('offer.create')->with('viewData', $viewData);
    }

    public function save(Request $request, int $auctionId): RedirectResponse
    {
        $user = Auth::user();
        Offer::validate($request);


        $auction = Auction::findOrFail($auctionId);

        $maxOffer = $auction->getMaxOffer();
        $maxPrice = $maxOffer ? $maxOffer->price : $auction->getBasePrice();

 
        if ($request->price <= $maxPrice) {
            return back()->withErrors(['price' => __('Offer.offer_error', ['maxPrice' => $maxPrice])]);
        }

        $offer = new Offer([
            'price' => $request->price,
            'auctionId' => $auctionId,
            'userId' => $user->getId(),
        ]);


        $offer->save();
        $auction->load('offers');

       
        if ($auction->offers()->count() >= 3) {
      
            $auction->active = false;
            $auction->save();

            $this->createOrder($auction);
        }

        return back()->with('success', __('Offer.offer_success'));
    }

    private function createOrder(Auction $auction): void
    {
        $product = $auction->getProduct();
        $maxOffer = $auction->getMaxOffer();

        $order = new Order();
        $order->total = $maxOffer->getPrice();
        $order->userId = $maxOffer->getUser()->getId(); 
        $order->save();


        $product->setOrderId($order->getId());
        $product->save();
    }
}
