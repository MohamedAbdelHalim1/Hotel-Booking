@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

<div class="container">
    <h2 class="mb-4">Edit Booking Status</h2>
    <form action="{{ route('admin.booking.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="accepted" {{ $status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

      
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>
</div>
@endsection
