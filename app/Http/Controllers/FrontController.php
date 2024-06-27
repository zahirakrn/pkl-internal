<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function shop()
    {
        return view('front.shop');
    }

    public function cart()
    {
        return view('front.cart');
    }

    public function checkout()
    {
        return view('front.checkout');
    }
    
    public function track()
    {
        return view('track');
    }

    public function detail()
    {
        return view('detail');
    }

    public function about()
    {
        return view('about');
    }
}

