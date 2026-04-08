@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Portal Login</h4>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Student Number</label>
                        <input type="text" name="student_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="/register">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection