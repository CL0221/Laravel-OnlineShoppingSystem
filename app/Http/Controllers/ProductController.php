<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        $r=request();
        $keyword=$r->searchProduct;
        $products=DB::table('products')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->get();
        //dd($products);
        return view('main/searchResult')->with('products',$products);
    }

    public function show()
    {
        $products = DB::table('products')
        ->paginate(12);
        //->get();
        return view('main/allProducts')->with('products', $products);
    }

    public function view($id)
    {
        $products = DB::table('products')
        ->find($id);
        return view('main/productDetail')->with('products', $products);
    }

    public function priceRange(Request $request)
    {
        //dd($request->all());
        $query = DB::table('products')
        ->orderBy('price', 'asc')
        ->orderBy('name', 'desc');
        //$query = Product::orderBy('price','asc');
        if($request->keyword){
            // This will only execute if you received any keyword
            $query = $query->where('name','like','%'.$request->keyword.'%');
        }
        if($request->min_price && $request->max_price){
            // This will only execute if you received any price
            // Make you you validated the min and max price properly
            $query = $query->where('price','>=',$request->min_price);
            $query = $query->where('price','<=',$request->max_price);
        }
        $products = $query->get();
        return view('main.searchResult', compact('products'));
    }
}
