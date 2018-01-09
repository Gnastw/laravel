@extends('layouts.my_app')

<style>
    .user{
        display: inline-block;
        width: 49%;
    }
</style>

@section('content')
    @if(!empty($errors->all()))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Faire une nouvelle dépense:</h1>
    <form method="post" action="{{route('spending.update', $spending->id) }}" id="edit_spending">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>Titre:</label>
        <input required type="text" placeholder="Titre de la dépense" name="title" value="{{$spending->title}}">
        <label>Prix:</label>
        <input required type="text" placeholder="prix" name="price" value="{{$spending->price}}">
        <label>Description:</label>
        <input required type="text" name="description" value="{{$spending->description}}" >
        <button type="submit">Modifier</button>
        <h1>Partager la dépense avec:</h1>
        <div class="users">
            @foreach($users as $id => $user)
                <div class="user">
                    <input type="checkbox" id="{{$id}}" name="users[]" value="{{$id}}"
                           @foreach($spending->users as $users)
                               @if( $users->id === $id )
                               checked
                               @endif
                           @endforeach

                    >
                    <label for="{{$id}}">{{$user}}</label>
                </div>
            @endforeach
        </div>
    </form>

@endsection