<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function index()
    {
        $phone = DB::table('phones')
        ->paginate(9);
        //->get();
        return view('phone.phone')->with('phones', $phone);
    }

    public function viewDetail($id)
    {
        $phone = DB::table('phones')
        ->find($id);
        return view('phone.phoneDetail')->with('phones', $phone);
    }

    public function addPhone($id)
    {
        //Phone
        $phone = Phone::find($id);
        if(!$phone) {
            abort(404);
        }
        $cart = session()->get('phones');
        //add to compare
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $phone->name,
                        "price" => $phone->price,
                        "photo" => $phone->img,
                        "screen" => $phone->screen,
                        "os" => $phone->os,
                        "processor" => $phone->processor,
                        "graphic" => $phone->graphic,
                        "ram" => $phone->ram,
                        "storage" => $phone->storage,
                        "battery" => $phone->battery,
                        "camera_video" => $phone->camera_video,
                        "demension" => $phone->demension,
                        "simSlot" => $phone->simSlot,
                        "connection" => $phone->connection,
                        "audio" => $phone->audio,
                        "sensors" => $phone->sensors,
                        "warrenty" => $phone->warrenty
                    ]
            ];
            session()->put('phones', $cart);
            return redirect()->back()->with('success', 'Product added to compare successfully!');
        }

        // if item not exist in compare then add to compare
        $cart[$id] = [
            "name" => $phone->name,
            "price" => $phone->price,
            "photo" => $phone->img,
            "screen" => $phone->screen,
            "os" => $phone->os,
            "processor" => $phone->processor,
            "graphic" => $phone->graphic,
            "ram" => $phone->ram,
            "storage" => $phone->storage,
            "battery" => $phone->battery,
            "camera_video" => $phone->camera_video,
            "demension" => $phone->demension,
            "simSlot" => $phone->simSlot,
            "connection" => $phone->connection,
            "audio" => $phone->audio,
            "sensors" => $phone->sensors,
            "warrenty" => $phone->warrenty
        ];
        session()->put('phones', $cart);
        return redirect()->back()->with('success', 'Product added to compare successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('phones');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('phones', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return back();
    }

    public function view()
    {
        return view('phone.phoneCompare');
    }

    public function cartPhone(Phone $phone)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $phone->id,
            'name' => $phone->name,
            'price' => $phone->price,
            'quantity'=> 1,
            'attributes' => array(),
            'associatedModel' => $phone
        ));
        return redirect()->route('cart.index');
    }
    public function priceRange(Request $request)
    {
        //dd($request->all());
        $query = DB::table('phones')
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
        $phones = $query->paginate(100);
        return view('phone.phone', compact('phones'));
    }
}
