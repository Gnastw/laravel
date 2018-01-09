@extends('layouts.my_app')
@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection
@section('content')
    {{$spendings->links()}}
<table class="table">
    <thead>
        <tr>
            <td><h3>Title</h3></td>
            <td><h3>Price</h3></td>
            <td><h3>Associate</h3></td>
            <td><h3>Date</h3></td>
            <td><h3>Show</h3></td>
            <td><h3>Delete</h3></td>
        </tr>
    </thead>
    <tbody>
        @foreach($spendings as $spending)
            <tr>
                <td><a href="{{route('spending.edit', $spending->id)}}">{{$spending->title}}</a></td>
                <td>{{$spending->price}}</td>
                <td>
                    @foreach($spending->users as $users)
                        {{$users->name}}/
                    @endforeach
                </td>
                <td>{{$spending->created_at}}</td>
                <td><a href="{{route('spending.show', $spending->id)}}">Show</a></td>
                <td>
                    <form class="delete" method="post" action="{{route('spending.destroy', $spending->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$spendings->links()}}
@endsection