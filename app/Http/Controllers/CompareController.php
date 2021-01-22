<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function addToCompare($id)
    {
        //All Products
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('products');
        //add to compare
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "brand" => $product->brand,
                        "price" => $product->price,
                        "photo" => $product->img,
                        "simSlot" => $product->simSlot,
                        "screen" => $product->screen,
                        "os" => $product->os,
                        "processor" => $product->processor,
                        "graphic" => $product->graphic,
                        "ram" => $product->ram,
                        "storage" => $product->storage,
                        "battery" => $product->battery,
                        "camera_video" => $product->camera_video,
                        "connection" => $product->connection,
                        "audio" => $product->audio,
                        "dimension" => $product->dimension,
                        "others" => $product->others,
                        "warrenty" => $product->warrenty
                    ]
            ];
            session()->put('products', $cart);
            return redirect()->back()->with('success', 'Product added to compare successfully!');
        }

        // if item not exist in compare then add to compare
        $cart[$id] = [
            "name" => $product->name,
            "brand" => $product->brand,
            "price" => $product->price,
            "photo" => $product->img,
            "simSlot" => $product->simSlot,
            "screen" => $product->screen,
            "os" => $product->os,
            "processor" => $product->processor,
            "graphic" => $product->graphic,
            "ram" => $product->ram,
            "storage" => $product->storage,
            "battery" => $product->battery,
            "camera_video" => $product->camera_video,
            "connection" => $product->connection,
            "audio" => $product->audio,
            "dimension" => $product->dimension,
            "others" => $product->others,
            "warrenty" => $product->warrenty
        ];
        session()->put('products', $cart);
        return redirect()->back()->with('success', 'Product added to compare successfully!');

    }

    public function compareIndex()
    {
        return view('compare.compareIndex');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('products');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('products', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return back();
    }

}
