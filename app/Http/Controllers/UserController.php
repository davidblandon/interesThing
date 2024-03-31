<?php

/**
 * Created by: Juan Martín Espitia
 */


namespace App\Http\Controllers;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\User;

use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{




 public function index(): View
 {

   
   $viewData["title"] = "Home Page - Online Store";

    return view('home.index')->with("viewData", $viewData);
   

 }

 public function profile(int $id): View

 {

    $viewData = [];

    $user = User::findOrFail($id);

    $viewData["title"] = "Pofile Page - Online Store";
    
    $viewData["subtitle"] = $user -> getName()." - information";

    $viewData["user"] = $user;


    return view('user.profile')->with("viewData", $viewData);
 }


 
public function delete(string $id): RedirectResponse
{
    $auction = User::findOrFail($id);

    $auction -> delete();

    return redirect()->route('auction.list')->with('success', 'Auction deleted successfully');
}



}