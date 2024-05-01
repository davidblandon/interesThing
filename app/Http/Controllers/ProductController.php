<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function available(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - InteresThing';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::where('auctioned', false)->get();

        return view('product.available')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName().' - InteresThing';
        $viewData['subtitle'] = $product->getName().' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Product::validate($request);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $request->photo,
            'price' => $request->price,
            'category' => $request->category,
            'sellerId' => $user->getId()
        ]);

        return back();
    }
}
