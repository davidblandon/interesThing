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
        $viewData['title'] = 'Create offer';
        $viewData['auctionId'] = $auctionId;

        return view('offer.create')->with('viewData', $viewData);
    }

    public function save(Request $request, int $auctionId): RedirectResponse
    {
        $user = Auth::user();
        Offer::validate($request);

        // Obtén la instancia de Auction
        $auction = Auction::findOrFail($auctionId);

        // Obtén la oferta máxima actual
        $maxOffer = $auction->getMaxOffer();
        $maxPrice = $maxOffer ? $maxOffer->price : $auction->getBasePrice();

        // Validar que la nueva oferta sea mayor al precio máximo actual
        if ($request->price <= $maxPrice) {
            return back()->withErrors(['price' => 'The offer should be higher than '.$maxPrice.'.']);
        }
        // Crea una nueva oferta
        $offer = new Offer([
            'price' => $request->price,
            'auctionId' => $auctionId,
            'userId' => $user->getId(),
        ]);

        // Guarda la oferta en la base de datos

        $offer->save();
        $auction->load('offers');
        // Comprueba si hay tres o más ofertas
        if ($auction->offers()->count() >= 3) {
            // Desactiva la subasta
            $auction->active = false;
            $auction->save();

            // Crea la orden
            $this->createOrder($auction);
        }

        return back()->with('success', 'Oferta agregada exitosamente.');
    }

    private function createOrder(Auction $auction): void
    {
        $product = $auction->getProduct();
        $maxOffer = $auction->getMaxOffer();

        $order = new Order();
        $order->total = $maxOffer->getPrice();
        $order->userId = $maxOffer->getUser()->getId(); // Asumiendo que Offer tiene un campo userId
        $order->save();

        // Asocia el producto a la orden
        $product->setOrderId($order->getId());
        $product->save();
    }

}
