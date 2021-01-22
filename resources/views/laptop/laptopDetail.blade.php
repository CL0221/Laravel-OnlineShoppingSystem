@extends('layouts.navbar')
@section('content')
<style>
    table {
        background-color: white;
    }
    h4,h5 {
        text-align: center;
    }
    .center{
        display: block;
        margin-left: auto;
        margin-right: auto;
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
        <h4>{{$laptops->name}} Specifications</h4>
        <table class="table table-bordered">
            <tr>
                <td colspan="2">
                <img class="center" src="/images/{{$laptops->img}}" alt="Images">
                    <h4>{{$laptops->name}}</h4>
                    <h5>RM{{$laptops->price}}</h5>
                    <a href="{{route('cart.add', $laptops->id)}}" class="btn btn-dark center">
                        <i class="fas" aria-hidden="true">&#xf217;</i>Add To Cart
                    </a>
                </td>
            </tr>
            <tr>
                <th>Screen</th>
                <td>{{$laptops->screen}}</td>
            </tr>
            <tr>
                <th>Operating System</th>
                <td>{{$laptops->os}}</td>
            </tr>
            <tr>
                <th>Processor</th>
                <td>{{$laptops->processor}}</td>
            </tr>
            <tr>
                <th>Graphic</th>
                <td>{{$laptops->graphic}}</td>
            </tr>
            <tr>
                <th>RAM</th>
                <td>{{$laptops->ram}}</td>
            </tr>
            <tr>
                <th>Storage</th>
                <td>{{$laptops->storage}}</td>
            </tr>
            <tr>
                <th>Battery</th>
                <td>{{$laptops->battery}}</td>
            </tr>
            <tr>
                <th>Demension</th>
                <td>{{$laptops->demension}}</td>
            </tr>
            <tr>
                <th>Connection</th>
                <td>{{$laptops->connection}}</td>
            </tr>
            <tr>
                <th>Others</th>
                <td>{{$laptops->other}}</td>
            </tr>
            <tr>
                <th>Warrenty</th>
                <td>{{$laptops->warrenty}}</td>
            </tr>
        </table>
    </div>
</body>

@endsection
