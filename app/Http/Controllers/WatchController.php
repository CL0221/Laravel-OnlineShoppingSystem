<?php

namespace App\Http\Controllers;

use App\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchController extends Controller
{
    public function index()
    {
        $watch = DB::table('watches')
        //->paginate(9);
        ->get();
        return view('watch.watch')->with('watches', $watch);
    }

    public function view($id)
    {
        $watch = DB::table('watches')
        ->find($id);
        return view('watch.watchDetail')->with('watches', $watch);
    }

    public function addWatch($id)
    {
        //Watch
        $watch = Watch::find($id);
        if(!$watch) {
            abort(404);
        }
        $cart = session()->get('watches');
        //add to compare
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $watch->name,
                        "price" => $watch->price,
                        "photo" => $watch->img,
                        "screen" => $watch->screen,
                        "os" => $watch->os,
                        "ram" => $watch->ram,
                        "storage" => $watch->storage,
                        "battery" => $watch->battery,
                        "other" => $watch->other,
                        "demension" => $watch->demension,
                        "connection" => $watch->connection,
                        "warrenty" => $watch->warrenty
                    ]
            ];
            session()->put('watches', $cart);
            return redirect()->back()->with('success', 'Product added to compare successfully!');
        }
        // if item not exist in compare then add to compare
        $cart[$id] = [
            "name" => $watch->name,
            "price" => $watch->price,
            "photo" => $watch->img,
            "screen" => $watch->screen,
            "os" => $watch->os,
            "ram" => $watch->ram,
            "storage" => $watch->storage,
            "battery" => $watch->battery,
            "other" => $watch->other,
            "demension" => $watch->demension,
            "connection" => $watch->connection,
            "warrenty" => $watch->warrenty
        ];
        session()->put('watches', $cart);
        return redirect()->back()->with('success', 'Product added to compare successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('watches');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('watches', $cart);
            }
            session()->flash('success', 'Product removed success!!!');
        }
        return back();
    }

    public function watchCompareIndex()
    {
        return view('watch.watchCompare');
    }

    public function cartWatch(Watch $watch)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $watch->id,
            'name' => $watch->name,
            'price' => $watch->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $watch
        ));
        return redirect()->route('cart.index');
    }

    public function priceRange(Request $request)
    {
        //dd($request->all());
        $query = DB::table('watches')
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
        $watches = $query->get();
        return view('watch.watch', compact('watches'));
    }
}
