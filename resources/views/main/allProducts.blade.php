@extends('layouts.navbar')
@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    <div class="container">
        <h2>Products</h2>
        <div>
            <form action="{{route('priceRange')}}" method="GET" class="input-group mb-3">
                @csrf
                <input type="number" name="min_price" placeholder="Min" class="form-control">
                <input type="number" name="max_price" placeholder="Max" class="form-control">
                <input type="text" name="keyword" placeholder="Enter the keyword" class="form-control">
                <input type="submit" value="Filter" class="btn btn-outline-dark">
            </form>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach ($products as $product)
            <div class="col mb-4">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/{{ $product->img }}" class="card-img-top" alt="Card image cap" height="auto">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$product->name}}</h5>
                            <p class="card-text text-center">RM{{$product->price}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <a href="/productDetail/{{$product->id}}" class="card-link"><i class="fas">&#xf129;</i>Product Detail</a>
                            </div>
                            <div class="text-center">
                                <a href="{{route('cart.add', $product->id)}}" class="card-link"><i class="fas">&#xf217;</i>Add To Cart</a>
                            </div>
                            <div class="text-center">
                                <a href="{{route('compare', $product->id)}}" class="card-link">Add to Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>
        {{$products->onEachSide(1)->links()}}
    </div>
</body>

@endsection
