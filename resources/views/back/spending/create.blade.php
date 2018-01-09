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
<form method="post" action="{{route('spending.store') }}" id="create_spending">
    {{ csrf_field() }}
    <label>Titre:</label>
    <input required type="text" placeholder="Titre de la dépense" name="title" value="{{old('title')}}">
    <label>Prix:</label>
    <input required type="text" placeholder="prix" name="price" value="{{old('price')}}">
    <label>Description:</label>
    <input required type="text" name="description" value="{{old('description')}}">
    <button type="submit">Create</button>
    <h1>Partager la dépense avec:</h1>
    <div class="users">
        @foreach($users as $id => $user)
            <div class="user">
                <input type="checkbox" id="{{$id}}" name="users[]" value="{{$id}}"
                       @if( !empty(old('users')) and in_array($id, old('users'))  )
                       checked
                        @endif
                >
                <label for="{{$id}}">{{$user}}</label>
            </div>
        @endforeach
    </div>
</form>

@endsection