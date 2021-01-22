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
        width: 50%;
        height: auto;
    }
    body{
        background-color: rgb(197, 196, 196);
    }
</style>

<body>
    <div class="container">
        <h3>{{$phones->name}} Specifications</h3>
        <table class="table table-bordered">
            <tr>
                <td colspan="2">
                <img class="center" src="/images/{{$phones->img}}" alt="">
                    <h4>{{$phones->name}}</h4>
                    <h5>RM{{$phones->price}}</h5>
                    <a href="{{route('cart.add', $phones->id)}}" class="btn btn-dark center"><i class="fas" aria-hidden="true">&#xf217;</i>Add To Cart</a>
                </td>
            </tr>
            <tr>
                <th>Display Type</th>
                <td>{{$phones->screen}}</td>
            </tr>
            <tr>
                <th>Operating System</th>
                <td>{{$phones->os}}</td>
            </tr>
            <tr>
                <th>Processor</th>
                <td>{{$phones->processor}}</td>
            </tr>
            <tr>
                <th>Graphic</th>
                <td>{{$phones->graphic}}</td>
            </tr>
            <tr>
                <th>RAM</th>
                <td>{{$phones->ram}}</td>
            </tr>
            <tr>
                <th>Storage</th>
                <td>{{$phones->storage}}</td>
            </tr>
            <tr>
                <th>Battery</th>
                <td>{{$phones->battery}}</td>
            </tr>
            <tr>
                <th>Camera</th>
                <td>{{$phones->camera_video}}</td>
            </tr>
            <tr>
                <th>Demension</th>
                <td>{{$phones->demension}}</td>
            </tr>
            <tr>
                <th>Sim</th>
                <td>{{$phones->simSlot}}</td>
            </tr>
            <tr>
                <th>Network & Connection</th>
                <td>{{$phones->connection}}</td>
            </tr>
            <tr>
                <th>Audio</th>
                <td>{{$phones->audio}}</td>
            </tr>
            <tr>
                <th>Sensors</th>
                <td>{{$phones->sensors}}</td>
            </tr>
            <tr>
                <th>Warrenty</th>
                <td>{{$phones->warrenty}}</td>
            </tr>
        </table>
    </div>
</body>
@endsection
