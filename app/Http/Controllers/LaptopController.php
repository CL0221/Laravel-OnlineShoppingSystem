<?php

namespace App\Http\Controllers;

use App\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = DB::table('laptops')
        ->paginate(9);
        return view('laptop.laptop')->with('laptops', $laptops);
    }

    public function viewDetail($id)
    {
        $laptops = DB::table('laptops')
        ->find($id);
        return view('laptop.laptopDetail')->with('laptops', $laptops);
    }

    public function addLaptop($id)
    {
        //Laptop
        $laptops = Laptop::find($id);
        if(!$laptops) {
            abort(404);
        }
        $cart = session()->get('laptops');
        //add to compare
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $laptops->name,
                        "price" => $laptops->price,
                        "photo" => $laptops->img,
                        "screen" => $laptops->screen,
                        "os" => $laptops->os,
                        "processor" => $laptops->processor,
                        "graphic" => $laptops->graphic,
                        "ram" => $laptops->ram,
                        "storage" => $laptops->storage,
                        "battery" => $laptops->battery,
                        "demension" => $laptops->demension,
                        "other" =>$laptops->other,
                        "connection" => $laptops->connection,
                        "warrenty" => $laptops->warrenty
                    ]
            ];
            session()->put('laptops', $cart);
            return redirect()->back()->with('success', 'Product added to compare successfully!');
        }

        // if item not exist in compare then add to compare
        $cart[$id] = [
            "name" => $laptops->name,
            "price" => $laptops->price,
            "photo" => $laptops->img,
            "screen" => $laptops->screen,
            "os" => $laptops->os,
            "processor" => $laptops->processor,
            "graphic" => $laptops->graphic,
            "ram" => $laptops->ram,
            "storage" => $laptops->storage,
            "battery" => $laptops->battery,
            "demension" => $laptops->demension,
            "other" =>$laptops->other,
            "connection" => $laptops->connection,
            "warrenty" => $laptops->warrenty
        ];
        session()->put('laptops', $cart);

        return redirect()->back()->with('success', 'Product added to compare successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('laptops');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('laptops', $cart);
            }
            session()->flash('success', 'Product removed success');
        }
        return back();
    }

    public function view()
    {
        return view('laptop.laptopcompare');
    }

    public function cartLaptop(Laptop $laptop)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $laptop->id,
            'name'=> $laptop->name,
            'price' => $laptop->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $laptop
        ));
        return redirect()->route('cart.index');
    }

    public function priceRange(Request $request)
    {
        //dd($request->all());
        $query = DB::table('laptops')
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
        $laptops = $query->paginate(100);
        return view('laptop.laptop', compact('laptops'));
    }

}
