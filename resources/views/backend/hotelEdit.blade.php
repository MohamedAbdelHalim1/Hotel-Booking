@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Hotel</h2>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $hotel->name }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" value="{{ $hotel->city }}" required>
        </div>
        <div class="form-group">
            <label for="stars">Stars</label>
            <input type="number" name="stars" class="form-control" id="stars" value="{{ $hotel->stars }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Hotel</button>
    </form>
</div>
@endsection
