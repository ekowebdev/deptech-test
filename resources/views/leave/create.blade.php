@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    Tambah
                    <a href="{{ route('leave') }}">
                        <button class="btn btn-warning btn-xs float-right" style="font-size: 14px;">Kembali</button>
                    </a>
                </div>
                  <div class="card-body">
                      <form action="{{ route('leave.store') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="employee_id" class="col-md-4 col-form-label text-md-right">Nama Pegawai</label>
                              <div class="col-md-6">
                                  <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">[Pilih Pegawai]</option>
                                    @foreach($employee as $emp)
                                        <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                                    @endforeach
                                  </select>
                                   @if ($errors->has('employee_id'))
                                      <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">Alasan</label>
                            <div class="col-md-6">
                                <textarea name="reason" id="reason" class="form-control" cols="50"></textarea>
                                @if ($errors->has('reason'))
                                    <span class="text-danger">{{ $errors->first('reason') }}</span>
                                @endif
                            </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="start_date" class="col-md-4 col-form-label text-md-right">Tanggal Mulai Cuti</label>
                              <div class="col-md-6">
                                  <input type="date" id="start_date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                                  @if ($errors->has('start_date'))
                                      <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Tanggal Selesai Cuti</label>
                            <div class="col-md-6">
                                <input type="date" id="end_date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                                @if ($errors->has('end_date'))
                                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>
                        </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                Simpan
                              </button>
                          </div>
                      </form>  
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection