<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function avaliable(Request $request): View
    {
        $search = $request->input('search');

        $query = Product::where('auctioned', false)->whereNull('buyerId');

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        $viewData = [];
        $viewData['title'] = __('ProductController.products_title');
        $viewData['subtitle'] = __('ProductController.products_subtitle');
        $viewData['products'] = $query->get();

        return view('product.available')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('ProductController.create_product_title');
        $viewData['categories'] = __('ProductController.categories');

        return view('product.create')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $productName = $product->getName();
        $viewData['title'] = __('ProductController.product_info_title', ['productName' => $productName]);
        $viewData['subtitle'] = __('ProductController.product_info_subtitle', ['productName' => $productName]);
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Product::validate($request);
        $photoPath = $request->file('photo')->store('photos', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'category' => $request->category,
            'sellerId' => $user->getId(),
        ]);

        return back();
    }
}
