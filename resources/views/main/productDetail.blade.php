@extends('layouts.navbar')
@section('content')
<style>
    table {
        background-color: white;
    }
    h4,h5{
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
            <table class="table table-bordered">
                <h4>{{$products->name}} Specifications</h4>
                <tr>
                    <td colspan="2">
                        <img class="center" src="/images/{{$products->img}}" alt="Images" width="50%" height="auto">
                        <h4>{{$products->name}}</h4>
                        <h5>RM{{$products->price}}</h5>
                        <a href="{{route('cart.add', $products->id)}}" class="btn btn-dark center">
                            <i class="fas" aria-hidden="true">&#xf217;</i> Add To Cart</a>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Sim Slot</th>
                    <td>{{$products->simSlot}}</td>
                </tr>
                <tr>
                    <th>Screen</th>
                    <td>{{$products->screen}}</td>
                </tr>
                <tr>
                    <th>OS</th>
                    <td>{{$products->os}}</td>
                </tr>
                <tr>
                    <th>Processor</th>
                    <td>{{$products->processor}}</td>
                </tr>
                <tr>
                    <th>Graphic</th>
                    <td>{{$products->graphic}}</td>
                </tr>
                <tr>
                    <th>RAM</th>
                    <td>{{$products->ram}}</td>
                </tr>
                <tr>
                    <th>Storage</th>
                    <td>{{$products->storage}}</td>
                </tr>
                <tr>
                    <th>Battery</th>
                    <td>{{$products->battery}}</td>
                </tr>
                <tr>
                    <th>Camera&Video/Resolution</th>
                    <td>{{$products->camera_video}}</td>
                </tr>
                <tr>
                    <th>Network & Connection</th>
                    <td>{{$products->connection}}</td>
                </tr>
                <tr>
                    <th>Loudspeaker/Audio</th>
                    <td>{{$products->audio}}</td>
                </tr>
                <tr>
                    <th>Dimension</th>
                    <td>{{$products->dimension}}</td>
                </tr>
                <tr>
                    <th>Others</th>
                    <td>{{$products->others}}</td>
                </tr>
                <tr>
                    <th>Warrenty</th>
                    <td>{{$products->warrenty}}</td>
                </tr>
            </table>
        </div>
</body>

@endsection
