@extends('admin.layouts.document')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Genre <?= $genre->name ?? '' ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.genres.update', $genre)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
          <input type="hidden" name="id" value="{{ $genre->id ?? ''  }}">
      <div class="card-body">
        <div class="form-group">
          <label for="genre">Genre</label>
          <input type="text" class="form-control" id="genre" placeholder="Enter genre" name="name" value="{{$genre->name ?? ''}}">
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  @endsection