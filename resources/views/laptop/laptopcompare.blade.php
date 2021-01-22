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
    @if (session('laptops'))
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['name']}}</td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td><img src="/images/{{$laptops['photo']}}" alt="" width="50%" height="auto"></td>
                @endforeach
            </tr>
            <tr>
                <th>Price</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>RM{{$laptops['price']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Screen</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['screen']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Os</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['os']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Processor</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['processor']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Graphic</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['graphic']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Ram</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['ram']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Storage</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['storage']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Battery</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['battery']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Dimension</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['demension']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Others</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['other']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Connection</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['connection']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Warrenty</th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>{{$laptops['warrenty']}}</td>
                @endforeach
            </tr>

            <tr>
                <th></th>
                @foreach (session('laptops') as $id=>$laptops)
                    <td>
                        <form action="{{route('removeLaptop', $id)}}" method="GET">
                        @csrf
                        <button class="btn btn-danger btn-lg" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                @endforeach
            </tr>
        </table>
    @else
        <h4>No Item</h4>
    @endif
</body>
@endsection
