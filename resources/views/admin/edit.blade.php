@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    Edit
                    <a href="{{ route('admin') }}">
                        <button class="btn btn-warning btn-xs float-right" style="font-size: 14px;">Kembali</button>
                    </a>
                </div>
                  <div class="card-body">
                      <form action="{{ route('admin.update', $data->id) }}" method="POST">
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
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password">
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
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