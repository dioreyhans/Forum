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
        <h3 class="card-title">Recent discussion and answers</h3>
      </div>
      <!-- /.card-header -->
      @forelse ($list as $key => $item)
              <div class="media border p-3 mb-3">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        <div class="media-body">
          <h4><a style="color: black" href="{{ route('post.show',['post'=>$item->id]) }}">{{  $item->judul }}</a> </h4>
          <p>{{  $item->isi }}</p>
          <small><i>Posted on {{  $item->created_at->diffForHumans() }}</i></small>
        </div>
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