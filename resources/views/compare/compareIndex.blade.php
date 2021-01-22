@extends('layouts.navbar')

@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
    table{
        background-color: white;
    }
</style>
<body>
        @if (session('products'))
        <table class="table table-bordered table-responsive">
            <tr>
                <th></th>
                @foreach (session('products') as $id=>$details)
                <td><img src="images/{{$details['photo']}}" alt="" width="200" height="auto"></td>
                @endforeach
            </tr>
            <tr>
                <th>Name</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['name']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Price</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['price']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Sim</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['simSlot']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Screen</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['screen']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>OS</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['os']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Processor</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['processor']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Graphic</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['graphic']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>RAM</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['ram']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Storage</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['storage']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Battery</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['battery']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Camera&Video</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['camera_video']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Network & Connection</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['connection']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Audio</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['audio']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Dimension</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['dimension']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Others</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['others']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Warrenty</th>
                @foreach (session('products') as $id=>$details)
                <td>{{$details['warrenty']}}</td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach (session('products') as $id=>$details)
                <td>
                    <form action="{{route('removeCompare', $id)}}">
                        @csrf
                        <button class="btn btn-danger btn-lg" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </form>
                    <button class="btn btn-info" type="submit">
                        <a href="{{route('cart.add', $id)}}">
                            <i class="fas" aria-hidden="true">&#xf217;</i>Add To Cart</a>
                    </button>
                </td>
                @endforeach
            </tr>
        </table>
        @else
            <h3>No items</h3>
        @endif
</body>

@endsection
