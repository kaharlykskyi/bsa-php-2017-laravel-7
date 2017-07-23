@extends('cars.email.base-email')

@section('content')

    <span class="text-success">New car in our service: </span>
    <a href="{{ route('cars.show', ['id' => $car['id']]) }}">
        {{ $car['model'] }}
    </a>
    <p><b>Color:</b>&nbsp;{{ $car['color'] }}</p>
    <p><b>Price:</b>&nbsp;{{ $car['price'] }}</p>
    <p><b>Year:</b>&nbsp;{{ $car['year'] }}</p>
    <p><b>Registration number:</b>&nbsp;{{ $car['registration_number'] }}</p>
    <p><b>Mileage:</b>&nbsp;{{ $car['mileage'] }}</p>

@endsection

