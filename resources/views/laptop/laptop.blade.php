@extends('layouts.navbar')
@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    <div class="container text-center">
        <h2>Products</h2>
        <div class="form-group">
            <form action="{{route('priceRangeLaptop')}}" method="GET" class="input-group mb-3">
                @csrf
                <input type="number" name="min_price" placeholder="Min" class="form-control">
                <input type="number" name="max_price" placeholder="Max" class="form-control">
                <input type="text" name="keyword" placeholder="Enter the keyword" class="form-control">
                <input type="submit" value="Filter" class="btn btn-outline-dark">
            </form>
            <div class="btn-group">
                <a href="{{route('laptopCompare')}}" class="btn btn-outline-dark">
                    Compare
                    <span class="badge badge-pill badge-danger">{{ count((array) session('laptops')) }}</span>
                </a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach ($laptops as $laptop)
            <div class="col mb-4">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/{{ $laptop->img }}" class="card-img-top" alt="Card image cap" height="auto">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$laptop->name}}</h5>
                            <b class="card-text">RM{{$laptop->price}}</b>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <a href="/laptopDetail/{{$laptop->id}}" class="card-link">
                                    <i class="fas">&#xf129;</i>
                                    Product Detail
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{route('cartLaptop', $laptop->id)}}" class="card-link">
                                    <i class="fas">&#xf217;</i>
                                    Add To Cart
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{route('addLaptop', $laptop->id)}}" class="card-link">Add to Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$laptops->onEachSide(1)->links()}}
    </div>
</body>
@endsection
