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
        <h4>{{$t_v_s->name}} Specifications</h4>
        <table class="table table-bordered">
            <tr>
                <td colspan="2">
                <img class="center" src="/images/{{$t_v_s->img}}" alt="">
                    <h4>{{$t_v_s->name}}</h4>
                    <h5>RM{{$t_v_s->price}}</h5>
                    <a href="{{route('cart.add', $t_v_s->id)}}" class="btn btn-dark center">
                    <i class="fas" aria-hidden="true">&#xf217;</i>Add To Cart</a>
                </td>
            </tr>
            <tr>
                <th>Screen</th>
                <td>{{$t_v_s->screen}}</td>
            </tr>
            <tr>
                <th>Operating System</th>
                <td>{{$t_v_s->os}}</td>
            </tr>
            <tr>
                <th>Power Supply</th>
                <td>{{$t_v_s->powerSupply}}</td>
            </tr>
            <tr>
                <th>Demension</th>
                <td>{{$t_v_s->demension}}</td>
            </tr>
            <tr>
                <th>Resolution</th>
                <td>{{$t_v_s->resolution}}</td>
            </tr>
            <tr>
                <th>Connection</th>
                <td>{{$t_v_s->connection}}</td>
            </tr>
            <tr>
                <th>Sound</th>
                <td>{{$t_v_s->sound}}</td>
            </tr>
            <tr>
                <th>Others</th>
                <td>{{$t_v_s->other}}</td>
            </tr>
            <tr>
                <th>Warrenty</th>
                <td>{{$t_v_s->warrenty}}</td>
            </tr>
        </table>
    </div>
</body>

@endsection
