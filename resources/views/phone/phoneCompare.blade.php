@extends('layouts.navbar')
@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
    table {
        background-color: white;
    }
</style>
<body>
    @if (session('phones'))
        <table class="table table-bordered">
            <tr>
                <th></th>
                @foreach (session('phones') as $id=>$phone)
                    <td><img src="/images/{{$phone['photo']}}" alt="" width="50%" height="auto"></td>
                @endforeach
            </tr>
            <tr>
                <th>Name</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['name']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Price</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>RM{{$phone['price']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Screen</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['screen']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Operating System</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['os']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Processor</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['processor']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Graphic</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['graphic']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>RAM</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['ram']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Storage</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['storage']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Battery</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['battery']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Camera&Video</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['camera_video']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Demension</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['demension']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>simSlot</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['simSlot']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Connection</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['connection']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Audio</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['audio']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Sensors</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['sensors']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Warrenty</th>
                @foreach (session('phones') as $id=>$phone)
                    <td>{{$phone['warrenty']}}</td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach (session('phones') as $id=>$phone)
                <td>
                    <form action="{{route('removePhone', $id)}}">
                        @csrf
                        <button class="btn btn-danger btn-lg" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
                @endforeach
            </tr>
        </table>
    @else
        <h4>No Items</h4>
    @endif
</body>
@endsection
