@extends('layouts.my_app')
@section('content')
    <h2>Informations du compte :</h2>
    <p>Username: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Phone: {{$user->phone}}</p>
    <img src="{{asset($user->picture->link)}}" alt="..." class="img-rounded">
@endsection