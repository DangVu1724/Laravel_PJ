@extends('layouts.admin_app')

@section('content')

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f3f4f6;
                font-family: 'Poppins', sans-serif;
            }

            .container {
                background-color: #ffffff;
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                margin-top: 40px;
            }

            h1 {
                color: #007bff;
                font-weight: 700;
                text-align: center;
                margin-bottom: 30px;
                text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
            }

            .btn-primary {
                background: linear-gradient(135deg, #007bff, #0056b3);
                border: none;
                border-radius: 12px;
                transition: transform 0.3s ease;
            }

            .btn-primary:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            }

            .table {
                border-radius: 10px;
                overflow: hidden;
                background-color: #fff;
            }

            .table th {
                background-color: #007bff;
                color: #fff;
                text-align: center;
                vertical-align: middle;
            }

            .table td {
                vertical-align: middle;
                text-align: center;
            }

            .btn-warning {
                background-color: #ffc107;
                border: none;
                border-radius: 8px;
                transition: transform 0.3s ease;
            }

            .btn-warning:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 10px rgba(255, 193, 7, 0.4);
            }

            .btn-danger {
                background-color: #dc3545;
                border: none;
                border-radius: 8px;
                transition: transform 0.3s ease;
            }

            .btn-danger:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 10px rgba(220, 53, 69, 0.4);
            }
        </style>
    </head>

    <div class="container">
        <h1 class="my-4 text-center">Manage Users</h1>

        <!-- Thêm sản phẩm -->
        <a href="{{ config('app.url') }}/admin/user/create" class="btn btn-primary mb-3">Add User</a>

        <!-- Bảng sản phẩm -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ config('app.url') }}/admin/user/{{ $user->id }}/orders">
                                {{ $user->name }}
                            </a>
                        </td>

                        <td>{{ $user->email }}</td>
                        <!-- <td>{{ $user->password }}</td> -->
                        <td>
                            <a href="{{ config('app.url') }}/admin/user/{{ $user->id }}/edit"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ config('app.url') }}/admin/user/{{ $user->id }}" method="POST"
                                style="display:inline;">
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