@extends('layouts.my_app')
@section('content')
    <h2>Spending :</h2>
    <p>Title spending:{{$spending->title}} ,total price:{{$spending->price}}</p>
    <br/>
    <h2>Description :</h2>
    <p>{{$spending->description}}</p>
    <h2>Association details:</h2>
    @foreach($spending->users as $user)
        <li>{{$user->name}}, part:{{$user->pivot->price}}</li>
    @endforeach
@endsection