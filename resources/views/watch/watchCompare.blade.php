@extends('layouts.navbar')
@section('content')
<style>
    table{
        background-color: white;
    }
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    @if (session('watches'))
        <table class="table table-bordered">
            <tr>
                <th></th>
                @foreach (session('watches') as $id=>$watches)
                    <td><img src="/images/{{$watches['photo']}}" alt="" width="50%" height="auto"></td>
                @endforeach
            </tr>
            <tr>
                <th>Name</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['name']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Price</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['price']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Screen</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['screen']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Operating System</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['os']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>RAM</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['ram']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Storage</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['storage']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Battery</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['battery']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Other</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['other']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Demensnion</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['demension']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Connection</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['connection']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Warrenty</th>
                @foreach (session('watches') as $id=>$watches)
                    <td>{{$watches['warrenty']}}</td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach (session('watches') as $id=>$watches)
                    <td>
                        <form action="{{route('removeWatch', $id)}}" method="GET">
                        @csrf
                            <button class="btn btn-danger btn-lg" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                @endforeach
            </tr>
        </table>
    @else
        <h3>No Items</h3>
    @endif
</body>
@endsection
