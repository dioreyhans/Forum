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
        <div class="card h-100">
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
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mb-2 text-primary">Personal Details</h6>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="fullName">Full Name</label>
                  @if ($profile == null)
                  <h5>{{ Auth::user()->name }}</h5>
                  @else
                  <h5>{{ $profile->fullname }}</h5>
                  @endif
                  
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="eMail">Email</label>
                  <h5>{{ Auth::user()->email }}</h5>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="umur">Umur</label>
                  @if ($profile == null)
                      
                  @else
                  <h5>{{ $profile->umur }}</h5>
                  @endif
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="alamat">Address</label>
                  @if ($profile == null)
                  @else
                  <h5>{{ $profile->alamat }}</h5>
                  @endif
                  
                </div>
              </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="text-right">
                  @if ($profile == null)
                  <a class="btn btn-primary" href="profile/create" role="button">Update</a>
                  @else
                  <a class="btn btn-primary" href="/profile/{{ $profile->id }}/edit" role="button">Update</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>

        <!-- /.card-body -->
  
        <div class="card-footer">
          
        </div>
    </div>
  </div>

@endsection