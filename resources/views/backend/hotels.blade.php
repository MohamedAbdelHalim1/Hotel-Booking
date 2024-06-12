@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Hotels</h2>
    <a href="{{ route('admin.hotel.create') }}" class="btn btn-warning btn-sm" style="float:right;">Add New Hotel</a><br>

    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Stars</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->stars }}</td>
                    <td>
                        <a href="{{ route('admin.hotels.show', $hotel->id) }}" class="btn btn-warning btn-sm">Show</a>
                        <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.rooms.index', $hotel->id) }}" class="btn btn-primary btn-sm">Rooms</a>
                        <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline-block;">
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
