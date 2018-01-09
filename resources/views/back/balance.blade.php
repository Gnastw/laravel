@extends('layouts.my_app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Part</th>
                <th>Prix stay</th>
                <th>Prix Débit</th>
                <th>Prix Crédit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @php
                    $priceStay = round($pricepart*$user->part->days, 2);

                    $priceDebit =  $user->spendings()->sum('spending_user.price');
                @endphp
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->part->days}}</td>
                    <td>{{$priceStay }}</td>
                    <td>
                        {{$priceDebit}}
                    </td>
                    <td>{{$priceStay - $priceDebit}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection