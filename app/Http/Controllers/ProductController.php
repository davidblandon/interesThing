<?php

/**
 * Created by: David Blandon
 */

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::where('auctioned', false)->get();

        return view('product.list')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;
        $viewData['seller'] = User::findOrFail($product->seller)->getName();

        return view('product.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        Product::findOrFail($id)->delete();

        return Redirect::route('user.admin');
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';
        $viewData['categories'] = ['Clothing and Accessories', 'Electronics', 'Home', 'Entertainment', 'Jewelry', 'Art and Antiques'];

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
            'seller' => $user->getId(),
            'photo' => $photoPath,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        Session::flash('message', 'The product has been created succefully');

    return back();
    }


    public function category(Request $request): View
    {

        $viewData = [];
        $category = $request->input('category');

        if ($categoryId) {
            $products = Product::where('category', $category)->get();
        } else {
            $products = null;
        }
            
 
        $viewData['products'] = $products;
        return view('product.category')->with('viewData', $viewData);
        }


    public function name(Request $request): View
    {
        
        $viewData = [];

        $request->validate([
            'name' => 'required'
        ]);

        $searchTerm = $request->input('name');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
        $viewData['products'] = $products;

      return view('product.name')->with('viewData', $viewData);
    }

}


