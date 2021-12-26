@extends('adminlte.master')
{{-- @section('background')
<div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('img/bg.jpg') }});background-size:100%">
    <div class="container" style="color: white">
      <h1>Bootstrap Tutorial</h1>
      <p>Bootstrap is the most popular HTML, CSS...</p>
    </div>
  </div>
@endsection --}}
@section('content')
<div class="container">
  <div class="card card-primary m-3">
      <div class="card-header">
        <h3 class="card-title">Profile</h3>
      </div>
      <!-- /.card-header -->
        <div class="row gutters m-3">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="{{ Auth::user()->name }}">
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form action="/profile/{{$profile->id}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" value="{{ old('fullname', $profile->fullname) }}">
                      </div>
                      @error('fullname')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ID" value="{{ Auth::user()->email }}">
                      </div>
                      @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="umur">Age</label>
                        <input type="text" class="form-control" name="umur" id="Umur" placeholder="Enter Age" value="{{ old('umur', $profile->umur) }}">
                      </div>
                      @error('umur')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="alamat">Address</label>
                        <input type="text" class="form-control" name="alamat" id="address" placeholder="Enter Address" value="{{ old('alamat', $profile->alamat) }}">
                      </div>
                      @error('alamat')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                      </div>
                    </div>
                  </div>

          </div>
          </form>
        </div>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
  </div>

@endsection