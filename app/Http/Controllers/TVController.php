<?php

namespace App\Http\Controllers;

use App\TV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TVController extends Controller
{
    public function index()
    {
        $tv = DB::table('t_v_s')
        ->paginate(9);
        //->get();
        return view('tv.tv')->with('t_v_s', $tv);
    }

    public function viewDetail($id)
    {
        $tv = DB::table('t_v_s')
        ->find($id);
        return view('tv.tvDetail')->with('t_v_s', $tv);
    }

    public function addTv($id)
    {
        //TV
        $tvs = TV::find($id);
        if(!$tvs) {
            abort(404);
        }
        $cart = session()->get('tvs');
        //add to compare
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $tvs->name,
                        "price" => $tvs->price,
                        "photo" => $tvs->img,
                        "screen" => $tvs->screen,
                        "os" => $tvs->os,
                        "powerSupply" => $tvs->powerSupply,
                        "other" => $tvs->other,
                        "demension" => $tvs->demension,
                        "resolution" => $tvs->resolution,
                        "connection" => $tvs->connection,
                        "sound" => $tvs->sound,
                        "warrenty" => $tvs->warrenty
                    ]
            ];
            session()->put('tvs', $cart);
            return redirect()->back()->with('success', 'Product added to compare successfully!');
        }
        // if item not exist in compare then add to compare
        $cart[$id] = [
            "name" => $tvs->name,
            "price" => $tvs->price,
            "photo" => $tvs->img,
            "screen" => $tvs->screen,
            "os" => $tvs->os,
            "powerSupply" => $tvs->powerSupply,
            "other" => $tvs->other,
            "demension" => $tvs->demension,
            "resolution" => $tvs->resolution,
            "connection" => $tvs->connection,
            "sound" => $tvs->sound,
            "warrenty" => $tvs->warrenty
        ];
        session()->put('tvs', $cart);
        return redirect()->back()->with('success', 'Product added to compare successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('tvs');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('tvs', $cart);
            }
            session()->flash('success', 'Product removed success!!!');
        }
        return back();
    }

    public function view()
    {
        return view('tv.tvCompare');
    }

    public function cartTv(TV $tv)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $tv->id,
            'name' => $tv->name,
            'price' => $tv->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedtModel' => $tv
        ));
        return redirect()->route('cart.index');
    }

    public function priceRange(Request $request)
    {
        //dd($request->all());
        $query = DB::table('t_v_s')
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
        $t_v_s = $query->paginate(100);
        return view('tv.tv', compact('t_v_s'));
    }
}
