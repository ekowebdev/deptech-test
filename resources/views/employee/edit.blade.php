@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    Edit
                    <a href="{{ route('employee') }}">
                        <button class="btn btn-warning btn-xs float-right" style="font-size: 14px;">Kembali</button>
                    </a>
                </div>
                  <div class="card-body">
                      <form action="{{ route('employee.update', $data->id) }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="first_name" class="col-md-4 col-form-label text-md-right">Nama Depan</label>
                              <div class="col-md-6">
                                  <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $data->first_name }}" autofocus>
                                  @if ($errors->has('first_name'))
                                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Nama Belakang</label>
                            <div class="col-md-6">
                                <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $data->last_name }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" value="{{ $data->email }}" >
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>
                            <div class="col-md-6">
                                <input type="phone_number" id="phone_number" class="form-control" name="phone_number" value="{{ $data->phone_number }}">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="address" class="col-md-4 col-form-label text-md-right">Alamat</label>
                          <div class="col-md-6">
                              <textarea name="address" id="address" class="form-control" cols="50">{{ $data->address }}</textarea>
                              @if ($errors->has('address'))
                                  <span class="text-danger">{{ $errors->first('address') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                          <div class="col-md-6">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="men" value="men" {{ $data->gender == 'men' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="men">
                                      Laki-laki
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="women" value="women" {{ $data->gender == 'women' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="women">
                                      Perempuan
                                  </label>
                              </div>
                              @if ($errors->has('gender'))
                                  <span class="text-danger">{{ $errors->first('gender') }}</span>
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