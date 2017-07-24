@extends('cars.base')
@section('header')
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::route('index') }}">Car hire service</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @can('deleteCar', App\Entity\Car::class)
                            <li class="@yield('create-active')"><a href="{{ URL::route('cars.create') }}">Add</a></li>
                        @endcan
                        <li><a href="{{ URL::route('cars.index') }}">Cars list</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Rent car</div>
        <div class="panel-body">
            <form action=" {{ URL::route('rent.save', $car['id']) }} " class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}

                {{-- User input--}}
                <div class="form-group">
                    <label for="user" class="col-md-3 control-label">User</label>

                    <div class="col-md-6">
                        <input id="user" type="text" class="form-control" name="user" value="{{  $user->last_name }} {{  $user->first_name }}" readonly>
                    </div>
                </div>

                 {{--Car input--}}
                <div class="form-group">
                    <label for="car" class="col-md-3 control-label">Selected car</label>

                    <div class="col-md-6">
                        <input id="car" type="text" class="form-control" name="car" value="{{ $car->model }}" readonly>
                    </div>
                </div>

                 {{--Submit button--}}
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Accept rent
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection