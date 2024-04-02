<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class offerController extends Controller
{
    public function list(string $id): View
    {
        $auction = findOrFail($id);
        $viewData = [];
        $viewData['title'] = 'Offers';
        $viewData['subtitle'] = 'List of offers';
        $viewData['Offers'] = $auction -> offers();

        return view('offer.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; 
        $viewData['title'] = 'Create offer';

        return view('offer.create')->with('viewData', $viewData);
    }

    public function save(Request $request) :RedirectResponse
    {
        $user = Auth::user();

        Offer::validate($request);

        Offer::create($request->only([

            'price' => $request -> price,

            'user' => $user -> getId(),

            'auction' => $request -> auction,
    
    ]));

        return back()->with('Offer saved');
    }

}

