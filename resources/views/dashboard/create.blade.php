@extends('adminlte.master')

@section('content')
<div class="container">
<div class="card card-primary m-3">
    <div class="card-header">
      <h3 class="card-title">Add New Discussion</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/dashboard" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="judul">Judul :</label>
          <input type="text" class="form-control" name="judul" id="judul" >
        </div>
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="categories_id">Kategori :</label>
          <input type="text" class="form-control" name="categories_id" id="categories_id">
        </div>
        @error('categories_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="isi">Isi :</label>
          <textarea class="form-control" rows="5" name="isi" id="isi"></textarea>
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
