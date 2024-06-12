@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Hotel Details</h2>
    <div class="card">
        <div class="card-header">
            {{ $hotel->name }}
        </div>
        <div class="card-body">
            <p><strong>City:</strong> {{ $hotel->city }}</p>
            <p><strong>Stars:</strong> {{ $hotel->stars }}</p>
        </div>
    </div>
    <a href="{{ route('admin.hotels') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
