@extends('admin.layouts.document')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Platforms</h3>
                <a href="{{route('admin.platforms.create')}} " class="btn btn-app">
                  <i class="fas fa-edit"></i> New
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{Str::ucfirst(trans('app.name'))}}</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($platforms as $platform)
                            <tr>
                                <td>{{ ($platform->id ?? '') }}</td>
                                <td>{{ ($platform->name ?? '') }}</td>
                                <td>{{ ($platform->created_at ?? '') }}</td>
                                <td>{{ ($platform->updated_at ?? '') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.platforms.edit', $platform) }}" type="button" class="btn btn-info">Update</a>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                        <a href="{{ route("admin.platforms.destroy", $platform )}}" type="button" class="btn btn-info delete" onclick="event.preventDefault()">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>{{Str::ucfirst(trans('app.name'))}}</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection