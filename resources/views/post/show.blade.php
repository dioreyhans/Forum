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
      <div class="media border p-3 mb-3">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        <div class="media-body">
          <h4>{{  $post->judul }} <small><i>Posted on {{  $post->created_at->diffForHumans() }}</i></small></h4>
          <p>{{  $post->isi }}</p>
        </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus mr-3" aria-hidden="true"></i>Comment
        </button>
      </div>     
      <!--  Tambah Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/comment" method="POST">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="post_id" id="post_id" value="{{  $post->id }}" hidden>
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="5" name="isi" id="isi"></textarea>
        </div>
        @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>   
      
        <!-- /.card-body -->
  
        <div class="card-footer">
          
        </div>
    </div>

    @forelse ($comments as $comment)
    <div class="media border p-3 mb-3">
      <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
      <div class="media-body">
        <h4>{{  $comment->name }} </h4>
        <p>{{  $comment->isi }}</p>
        <small><i>Commented on {{  $post->created_at->diffForHumans() }}</i></small>
      </div>
      @if ($comment->user_id == Auth::user()->id)
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $comment->id }}" data-toggle="tooltip" title="Edit">
        <i class="fa fa-edit" aria-hidden="true"></i>
      </button>
                <form action="/comment/{{ $comment->id }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="text" class="form-control" name="post_id" id="post_id" value="{{  $post->id }}" hidden>
                  <input type="submit" value="Delete" class="btn btn-danger btn-sm ml-2">
                  </form>
      @endif
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="/comment/{{$comment->id}}" method="POST">
            @csrf
            @method('put')
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" name="post_id" id="post_id" value="{{  $post->id }}" hidden>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="isi" id="isi" >{{  old('isi',$comment->isi) }}</textarea>
            </div>
            @error('isi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div> 
    @empty
        
    
    @endforelse


  </div>

@endsection