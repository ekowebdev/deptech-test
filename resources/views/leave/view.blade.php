@extends('layout')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Data Cuti') }}
                            <a href="{{ route('leave.create') }}">
                                <button class="btn btn-primary btn-xs float-right" style="font-size: 14px;">Tambah</button>
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pegawai</th>
                                        <th>Alasan</th>
                                        <th>Tanggal Mulai Cuti</th>
                                        <th>Tanggal Selesai Cuti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->isEmpty())
                                        <tr>
                                            <td colspan="5" style="text-align: center">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($data as $leave)
                                            <tr>
                                                <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}
                                                </td>
                                                <td>{{ $leave->reason }}</td>
                                                <td>{{ $leave->start_date }}</td>
                                                <td>{{ $leave->end_date }}</td>
                                                <td>
                                                    <a href="{{ route('leave.edit', $leave->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('leave.delete', $leave->id) }}" method="POST"
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
