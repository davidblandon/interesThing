<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {

        $viewData['title'] = 'Home Page - Online Store';

        return view('home.index')->with('viewData', $viewData);

    }

    public function admin(): View
    {

        $products = Product::all();

        $auctions = Auction::all();

        $viewData['title'] = 'Pofile Page - Online Store';

        $viewData['products'] = $products;

        $viewData['auctions'] = $auctions;

        return view('admin')->with('viewData', $viewData);

    }

    public function profile(): View
    {

        $viewData = [];

        $user = Auth::user();

        $viewData['title'] = 'Pofile Page - Online Store';

        $viewData['subtitle'] = $user->getName().' - information';

        $viewData['user'] = $user;

        return view('user.profile')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $auction = User::findOrFail($id);

        $auction->delete();

        return redirect()->route('auction.list')->with('success', 'Auction deleted successfully');
    }
}
