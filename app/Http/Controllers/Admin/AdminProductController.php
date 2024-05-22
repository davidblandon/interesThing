<?php
/**
 * Created by: Laura
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Products - Online Store';
        $viewData['products'] = Product::all();
        $viewData['categories'] = ['Clothing and Accessories', 'Electronics', 'Home', 'Entertainment', 'Jewelry', 'Art and Antiques'];

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        $photoPath = $request->file('photo')->store('photos', 'public');
        $user = Auth::user();

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

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Edit Product - Online Store';
        $viewData['product'] = Product::findOrFail($id);
        $viewData['categories'] = ['Clothing and Accessories', 'Electronics', 'Home', 'Entertainment', 'Jewelry', 'Art and Antiques'];

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($request->input('name') != null) {
            $product->setName($request->input('name'));

        }

        if ($request->input('description') != null) {
            $product->setDescription($request->input('description'));
        }

        if ($request->input('price') != null) {
            $product->setPrice($request->input('price'));
        }

        if ($request->input('category') != null) {
            $product->setCategory($request->input('category'));
        }
        if ($request->input('image') != null) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $product->setPhoto($photoPath);
        }

        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete(int $id): RedirectResponse
    {

        Product::destroy($id);

        return back();
    }
}
