@extends('layouts.navbar')
@section('content')
<style>
    table{
        background-color: white;
    }
    .center{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    h3,h4,h5{
        text-align: center;
    }
    img{
        width: 480px;
        height: auto;
    }
    body{
        background-color: rgb(197, 196, 196);
    }
</style>

<body>
    <div class="container">
        <caption>
            <h3>{{$watches->name}} Specifications</h3>
        </caption>

        <table class="table table-hover">
            <tr>
                <td colspan="2">
                    <img class="center" src="/images/{{$watches->img}}" alt="">
                    <h3>{{$watches->name}}</h3>
                    <h5>RM{{$watches->price}}</h5>
                    <a href="{{route('cart.add', $watches->id)}}" class="btn btn-dark center"><i class="fas" aria-hidden="true">&#xf217;</i>Add To Cart</a>
                </td>
            </tr>
            <tr>
                <th>Screen</th>
                <td>{{$watches->screen}}</td>
            </tr>
            <tr>
                <th>Operating System</th>
                <td>{{$watches->os}}</td>
            </tr>
            <tr>
                <th>RAM</th>
                <td>{{$watches->ram}}</td>
            </tr>
            <tr>
                <th>Storage</th>
                <td>{{$watches->storage}}</td>
            </tr>
            <tr>
                <th>Battery</th>
                <td>{{$watches->battery}}</td>
            </tr>
            <tr>
                <th>Demension</th>
                <td>{{$watches->demension}}</td>
            </tr>
            <tr>
                <th>Connection</th>
                <td>{{$watches->connection}}</td>
            </tr>
            <tr>
                <th>Others</th>
                <td>{{$watches->other}}</td>
            </tr>
            <tr>
                <th>Warrenty</th>
                <td>{{$watches->warrenty}}</td>
            </tr>
        </table>
    </div>
</body>
@endsection
