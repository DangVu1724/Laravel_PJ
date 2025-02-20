@extends('layouts.admin_app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">👤 Add New User</h1>

    <!-- Form thêm người dùng -->
    <form action="{{ config('app.url') }}/admin/user" method="POST" enctype="multipart/form-data" class="user-form">
    @csrf
        <div class="form-group">
            <label for="name">🧑 Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">📧 Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">🔒 Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="role">⚙️ Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-submit">➕ Add User</button>
    </form>
</div>


<style>
body {
    background-color: #1c1c1c;
    color: #f0c020;
    font-family: 'Poppins', sans-serif;
}

.container {
    max-width: 700px;
    margin: 50px auto;
    background-color: #2a2a2a;
    border: 2px solid #f0c020;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(240, 192, 32, 0.5);
    padding: 30px;
}

h1 {
    color: #f0c020;
    text-shadow: 2px 2px 4px #000;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    border: 2px solid #f0c020;
    border-radius: 10px;
    background-color: #333;
    color: #fff;
}

.form-control::placeholder {
    color: #aaa;
}

.btn-submit {
    display: block;
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(45deg, #f0c020, #e6b800);
    color: #1c1c1c;
    font-weight: bold;
    font-size: 1.2em;
    cursor: pointer;
    transition: transform 0.3s;
}

.btn-submit:hover {
    transform: translateY(-5px);
    background: linear-gradient(45deg, #e6b800, #f0c020);
}

.btn-submit:active {
    transform: translateY(2px);
}
</style>
@endsection
