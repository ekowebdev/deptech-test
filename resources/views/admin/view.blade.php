@extends('layout')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Data Admin') }}
                            <a href="{{ route('admin.create') }}">
                                <button class="btn btn-primary btn-xs float-right" style="font-size: 14px;">Tambah</button>
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->isEmpty())
                                        <tr>
                                            <td colspan="4" style="text-align: center">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($data as $admin)
                                            <tr>
                                                <td>{{ $admin->first_name }}</td>
                                                <td>{{ $admin->last_name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit', $admin->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin.delete', $admin->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
