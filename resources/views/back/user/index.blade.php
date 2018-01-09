@extends('layouts.my_app')
@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <td><h3>Id</h3></td>
            <td><h3>Name</h3></td>
            <td><h3>Email</h3></td>
            <td><h3>Phone</h3></td>
            <td><h3>Show</h3></td>
            <td><h3>Delete</h3></td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href="{{route('user.edit', $user->id)}}">{{$user->id}}</a></td>
                <td>{{$user->name}}</td>
                <td>
                    {{$user->email}}
                </td>
                <td>{{$user->phone}}</td>
                <td><a href="{{route('user.show', $user->id)}}">Show</a></td>
                <td>
                    <form class="delete" method="post" action="{{route('user.destroy', $user->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button classe="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection