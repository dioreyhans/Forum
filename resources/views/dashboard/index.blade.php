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
  <a class="btn btn-primary ml-3 mt-3" href="{{ route('dashboard.create') }}"><i class="fa fa-plus mr-3" aria-hidden="true"></i>Add New Discussion</a>
  <div class="card card-primary m-3">
      <div class="card-header">
        <h3 class="card-title">Your discussion</h3>
      </div>
      <!-- /.card-header -->
      @forelse ($list as $key => $item)
              <div class="media border p-3 mb-3">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        <div class="media-body">
          <h4>{{  $item->judul }} <small><i>Posted on {{  $item->created_at }}</i></small></h4>
          <p>{{  $item->isi }}</p>
        </div>
        <a class="btn btn-primary btn-sm ml-2" href="/dashboard/{{ $item->id }}/edit" data-toggle="tooltip" title="Edit">
          Edit
        </a>
                  <form action="/dashboard/{{ $item->id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm ml-2">
                    </form>
      </div>

              @empty
              <center class="mt-3">No Data</center>
            
              
          @endforelse
        <!-- /.card-body -->
  
        <div class="card-footer">
          
        </div>
    </div>
  </div>

@endsection