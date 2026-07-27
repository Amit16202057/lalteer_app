<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function AboutUs(){
        return view('');
    }

    public function WishlistProduct(){
        return view('frontend.wishlistproduct.wishlistproduct');
    }
}
