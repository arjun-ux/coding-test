@extends('layouts.app')
@section('content')
    @can('isAdmin')
    <div class="container">
        <div class="row">
            <h2 class="mb-3">Daftar User</h2>
            <div class="col-md-12">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary mb-2"><i data-feather="user-plus"></i></a>
                <a href="{{ route('export') }}" class="btn btn-sm btn-info mb-2"><i data-feather="download"></i></a>

                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">File:</label>
                        <input id="file" type="file" name="file" class="form-control">
                    </div>
                    <button type="submit">import</button>
                </form>

                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_name}}</td>
                            <td>

                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    @endcan
@endsection
