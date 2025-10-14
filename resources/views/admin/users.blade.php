@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
<h1 class="mb-4">Users Management</h1>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered On</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sarah Smith</td>
            <td>sarah@example.com</td>
            <td>2025-10-01</td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>2025-10-02</td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
