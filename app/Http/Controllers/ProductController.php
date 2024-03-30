<?php

/**
 * Created by: David Blandon
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::all();

        return view('product.show')->with('viewData', $viewData);
    }

    public function detail(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

        return view('product.detail')->with('viewData', $viewData);
    }

    public function delete(string $id)
    {
        Product::findOrFail($id)->delete();

        return Redirect::route('product.show');
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        $request->validate(Product::rules());
        $auctioned = $request->has('auctioned') ? 1 : 0;
        $sold = $request->has('sold') ? 1 : 0;
        $photoPath = $request->file('photo')->store('photos', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
            'sold' => $sold,
            'price' => $request->price,
            'category' => $request->category,
            'auctioned' => $auctioned,
        ]);

        Session::flash('message', 'The product has been created succefully');

        return back();
    }
}
