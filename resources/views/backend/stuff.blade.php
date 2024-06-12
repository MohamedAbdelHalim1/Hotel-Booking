@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Hotel Stuff</h2>
    <a href="{{ route('admin.stuff.create') }}" class="btn btn-warning btn-sm" style="float:right;">Add New Member</a><br>

    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stuff as $stuff)
                <tr>
                    <td>{{ $stuff->id }}</td>
                    <td>{{ $stuff->name }}</td>
                    <td>{{ $stuff->email }}</td>
                    <td>{{ $stuff->role }}</td>
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
