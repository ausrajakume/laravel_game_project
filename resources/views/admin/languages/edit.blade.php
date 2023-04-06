@extends('admin.layouts.document')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Genre <?= $language->name ?? '' ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.languages.update', $language)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
          <input type="hidden" name="id" value="{{ $language->id ?? ''  }}">
      <div class="card-body">
        <div class="form-group">
          <label for="language">language</label>
          <input type="text" class="form-control" id="language" placeholder="Enter language" name="name" value="{{$language->name ?? ''}}">
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="labbr">abbr</label>
          <input type="text" class="form-control" id="abbr" placeholder="Enter abbr" name="abbr" value="{{$language->abbr ?? ''}}">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  @endsection