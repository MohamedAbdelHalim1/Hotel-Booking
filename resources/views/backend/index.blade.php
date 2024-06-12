@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Admin Panel</h2>
            <div class="btn-group-vertical w-100">
                <a href="{{ route('admin.bookings') }}" class="btn btn-primary btn-lg mb-3">Bookings</a>
                <a href="{{ route('admin.hotels') }}" class="btn btn-secondary btn-lg mb-3">Hotels</a>
                <a href="{{ route('admin.clients') }}" class="btn btn-success btn-lg mb-3">Clients</a>
                <a href="{{ route('admin.staff') }}" class="btn btn-info btn-lg mb-3">Stuff</a>
            </div>
        </div>
    </div>
</div>
@endsection
