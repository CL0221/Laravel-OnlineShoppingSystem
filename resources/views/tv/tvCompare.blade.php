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
    @if (session('tvs'))
        <table class="table table-bordered">
            <tr>
                <th></th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td><img src="/images/{{$tvs['photo']}}" alt="" width="60%" height="auto"></td>
                @endforeach
            </tr>
            <tr>
                <th>Name</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['name']}}</td>
                @endforeach
            </tr>

            <tr>
                <th>Price</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['price']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Screen</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['screen']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Operating System</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['os']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Power Supply</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['powerSupply']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Other</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['other']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Demension</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['demension']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Resolution</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['resolution']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Connection</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['connection']}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Warrenty</th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>{{$tvs['warrenty']}}</td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach (session('tvs') as $id=>$tvs)
                    <td>
                        <form action="{{route('removeTv', $id)}}" method="GET">
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
