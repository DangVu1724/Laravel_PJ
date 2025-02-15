@extends('layouts.admin_app')

@section('content')

<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <h1 class="my-4 text-center">Manage Users</h1>

    <!-- Thêm sản phẩm -->
    <a href="{{ config('app.url') }}/admin/user/create" class="btn btn-primary mb-3">Add User</a>

    <!-- Bảng sản phẩm -->
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>
                    <a href="{{ route('product.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product.destroy', $user) }}" method="POST" style="display:inline;">
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
@endsection