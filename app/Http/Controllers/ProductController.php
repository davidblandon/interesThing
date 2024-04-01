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
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::all();

        return view('product.list')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        Product::findOrFail($id)->delete();

        return Redirect::route('product.show');
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';
        $viewData['categories'] = ['Ropa y accesorios', 'Electrónicos', 'Hogar', 'Entretenimiento', 'Joyeria', 'Arte y antiguedad'];

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Product::validate($request);
        $photoPath = $request->file('photo')->store('photos', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'seller' => $user,
            'photo' => $photoPath,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        Session::flash('message', 'The product has been created succefully');

        return back();
    }
}
