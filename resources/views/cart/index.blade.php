@extends('layouts.navbar')

@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    <div class="container">
        <h2>Your cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td scope="row">{{$item->name}}</td>
                    <td>RM {{$item->price}}</td>
                    <td>RM {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
                    <td>
                        <form action="{{route('cart.update', $item->id)}}">
                        <input name="quantity" type="number" value={{$item->quantity}} min="1">
                        <input type="submit" value="Save">
                    </form>
                    </td>
                    <td>
                        <a href="{{route('cart.destroy', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <h3>
                Sub Total :RM {{\Cart::session(auth()->id())->getSubTotal()}}
            </h3>
            <a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Checkout</a>
        </div>

    </div>
</body>
@endsection
