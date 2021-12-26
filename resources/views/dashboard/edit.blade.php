@extends('adminlte.master')

@section('content')
<div class="container">
<div class="card card-primary m-3">
    <div class="card-header">
      <h3 class="card-title">Add New Discussion</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/dashboard/{{$post->id}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="judul">Judul :</label>
          <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $post->judul) }}">
        </div>
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="categories_id">Kategori :</label>
          <select class="form-control" class="form-control" name="categories_id" id="categories_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            @foreach ($kategori as $item)
            @if (old('categories_id', $post->categories_id)==$item->id)
            <option data-select2-id="{{ $item->id }}" value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
            <option data-select2-id="{{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
            
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="isi">Isi :</label>
          <textarea class="form-control" rows="5" name="isi" id="isi">{{ old('isi', $post->isi) }}</textarea>
        </div>
        @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection
