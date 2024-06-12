@extends('layouts.app')

@section('content')
<div class="container">
@if(session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2 class="mb-4">Rooms</h2>
    <a href="{{ route('admin.rooms.create' , $hotel) }}" class="btn btn-warning btn-sm" style="float:right;">Add New Room</a><br>

    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Hotel</th>
                <th>Type</th>
                <th>Status</th>
                <th>Price/day</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->hotel->name }}</td>
                    <td>{{ $room->type }}</td>
                    <td>{{ $room->status }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

@endsection
