@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

<div class="container">
    <h2 class="mb-4">Edit Room</h2>
    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="number">Room Number</label>
            <input type="text" name="number" class="form-control" value="{{ $room->number }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="single" {{ $room->type === 'single' ? 'selected' : '' }}>Single</option>
                <option value="double" {{ $room->type === 'double' ? 'selected' : '' }}>Double</option>
                <option value="suite" {{ $room->type === 'suite' ? 'selected' : '' }}>Suite</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="available" {{ $room->status === 'available' ? 'selected' : '' }}>Available</option>
                <option value="pending" {{ $room->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="booked" {{ $room->status === 'booked' ? 'selected' : '' }}>Booked</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $room->price }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Room</button>
    </form>
</div>
@endsection
