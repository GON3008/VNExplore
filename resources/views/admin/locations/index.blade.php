@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Locations</h2>
        <div class="py-3">
{{--            <a href="{{route('admin.locations.flights_location.index')}}" class="btn btn-success" id="createNewLocation">Flight Location</a>--}}
{{--            <a href="{{route('admin.locations.hotel_location.index')}}" class="btn btn-success" id="createNewLocation">Hotel Location</a>--}}
{{--            <a href="{{route('admin.locations.car_location.index')}}" class="btn btn-success" id="createNewLocation">Car Location</a>--}}
{{--            <a href="{{route('admin.locations.tour_location.index')}}" class="btn btn-success" id="createNewLocation">Tour Location</a>--}}
        </div>

        @include('admin.locations.car_location')
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
