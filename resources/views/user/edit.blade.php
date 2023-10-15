@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Halaman Edit User</h2>
        <div class="col-md-12">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-md-3">
                      <label for="inputPassword6" class="col-form-label">Nama</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="inputPassword6" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-md-3">
                      <label for="inputPassword6" class="col-form-label">Email</label>
                    </div>
                    <div class="col-auto">
                      <input type="email" id="inputPassword6" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-md-3">
                      <label for="inputPassword6" class="col-form-label">Password</label>
                    </div>
                    <div class="col-auto">
                      <input type="password" id="inputPassword6" class="form-control" name="password" value="{{ old('password', $user->password) }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-md-3">
                      <label for="inputPassword6" class="col-form-label">Role</label>
                    </div>
                    <div class="col-auto">
                      {{-- <input type="text" id="inputPassword6" class="form-control" name="role_name" value="{{ old('role_name', $user->role_name) }}"> --}}

                      <select class="form-control" id="inputPassword6" name="role_name">
                        <option selected>== {{ old('role_name', $user->role_name) }} ==</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                    </select>
                    </div>

                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>
                <a class="btn btn-warning" href="{{ route('user.index') }}">Cancel</a>
            </form>

        </div>
    </div>
</div>
@endsection
