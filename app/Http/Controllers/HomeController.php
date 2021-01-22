<?php

namespace App\Http\Controllers;

use App\TV;
use App\Phone;
use App\Watch;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //public function __construct()
    //{
    //    $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function main()
    {
        $products = Product::all()
        ->random(1);
        return view('main/home',['products'=>$products]);
    }

    public function index()
    {
        $products = Product::all()
        ->random(8);
        return view('main/home', ['allProducts' =>$products]);
    }



}
