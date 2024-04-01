<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class offerController extends Controller
{
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Offers';
        $viewData['subtitle'] = 'List of offers';
        $viewData['Offers'] = Offer::all();

        return view('offer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $offer = Offer::findOrFail($id);
        $viewData['title'] = $offer['name'].' - Online Store';
        $viewData['subtitle'] = $offer['name'].' - Product information';
        $viewData['offer'] = $offer;

        return view('offer.show')->with('viewData', $viewData);
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

    public function delete(int $id): RedirectResponse
    {
        $offer = Offer::findOrFail($id);

        $offer -> delete();
        return redirect() -> route('offer.list')->with('success', 'offer deleted succesfully');
    }
}

