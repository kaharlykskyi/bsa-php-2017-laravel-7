@extends('cars.email.base-email')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="text-success">New car in our service: </span>
                    <a href="{{ route('cars.show', ['id' => $car['id']]) }}">
                        {{ $car['model'] }}
                    </a>
                </div>
                    <div class="panel-body">
                        <p><span class="text-muted">Color:</span>&nbsp;{{ $car['color'] }}</p>
                        <p><span class="text-muted">Price:</span>&nbsp;{{ $car['price'] }}</p>
                        <p><span class="text-muted">Year:</span>&nbsp;{{ $car['year'] }}</p>
                        <p><span class="text-muted">Registration number:</span>&nbsp;{{ $car['registration_number'] }}</p>
                        <p><span class="text-muted">Mileage:</span>&nbsp;{{ $car['mileage'] }}</p>
                    </div>
            </div>
        </div>
    </div>

@endsection

