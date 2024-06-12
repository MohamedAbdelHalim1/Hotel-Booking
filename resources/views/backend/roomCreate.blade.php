@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Hotel</h2>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.rooms.store' , $hotel) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Room Number</label>
            <input type="text" name="number" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text"  class="form-control" placeholder="{{$hotel_name->name}}" readonly>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" id="type" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="booked">Booked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
</div>
@endsection
