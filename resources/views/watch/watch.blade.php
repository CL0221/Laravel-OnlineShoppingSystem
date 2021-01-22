@extends('layouts.navbar')
@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    <div class="container text-center">
        <h2>Smart Watches</h2>
        <div class="form-group">
            <form action="{{route('priceRangeWatch')}}" method="GET" class="input-group mb-3">
                @csrf
                <input type="number" name="min_price" placeholder="Min" class="form-control">
                <input type="number" name="max_price" placeholder="Max" class="form-control">
                <input type="text" name="keyword" placeholder="Enter the keyword" class="form-control">
                <input type="submit" value="Filter" class="btn btn-outline-dark">
            </form>
            <div class="btn-group">
                <a href="{{route('watchCompare')}}" class="btn btn-outline-dark">
                    Compare
                    <span class="badge badge-pill badge-danger">{{ count((array) session('watches')) }}</span>
                </a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach ($watches as $watch)
            <div class="col mb-4">
                <div class="card">
                    <img class="card-img-top" src="images/{{ $watch->img }}" alt="Card image cap" style="width: 100%; height:auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{$watch->name}}</h5>
                        <b class="card-text">RM{{$watch->price}}</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="/watchDetail/{{$watch->id}}" class="card-link"><i class="fas">&#xf129;</i>Product Detail</a>
                        </div>
                        <div class="text-center">
                            <a href="{{route('cartWatch', $watch->id)}}" class="card-link"><i class="fas">&#xf217;</i>Add To Cart</a>
                        </div>
                        <div class="text-center">
                            <a href="{{route('addWatch', $watch->id)}}" class="card-link">Add To Compare</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>

@endsection
