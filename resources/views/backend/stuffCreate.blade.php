@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Member</h2>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.stuff.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">email</label>
            <input type="email" name="email" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">password</label>
            <input type="password" name="password" class="form-control"  required>
        </div>
        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>
</div>
@endsection
