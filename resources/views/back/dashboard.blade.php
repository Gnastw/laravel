
@extends('layouts.my_app')
@section('content')
    <h1>Histogramme</h1>
    PLACE de l'histogramme
    @include('partials.graphic')
    <div class="container">
        <ul>
            @forelse($lastSpendings as $spending)
                <li>{{$spending->title}} prix : {{$spending->price}} date : {{$spending->created_at}}</li>
            @empty
                <li>Aucune dépense pour l'instant</li>
            @endif
        </ul>
    </div>
@endsection
