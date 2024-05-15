<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function create(int $auctionId): View
    {
        $viewData = [];
        $viewData['title'] = 'Create offer';
        $viewData['auctionId'] = $auctionId;

        return view('offer.create')->with('viewData', $viewData);
    }

    public function save(Request $request, int $auctionId): RedirectResponse
    {
        $user = Auth::user();
        Offer::validate($request);
        Offer::create([
            'price' => $request->price,
            'auctionId' => $auctionId,
            'userId' => $user->getId(),
        ]);

        return back();
    }

}
