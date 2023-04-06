@extends('admin.layouts.document')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Games</h3>
                <a href="{{route('admin.games.create')}} " class="btn btn-app">
                  <i class="fas fa-edit"></i> New
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Release Date</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Price</th>
                            <th>Genres</th>
                            <th>Platforms</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ ($game->id ?? '') }}</td>
                                <td><img width="100" src="{{ asset('storage/images/'.($game->image ?? 'noimage.jpg'))}} "></td>
                                <td>{{ ($game->title ?? '') }}</td>
                                <td>{{ ($game->release_date ?? '') }}</td>
                                <td>{{ ($game->description ?? '') }}</td>
                                <td>{{ ($game->rating ?? '') }}</td>
                                <td>{{ ($game->price ?? '') }}</td>
                               <td> @foreach ($game->genres as $genre)
                                {{ ($genre->name ?? '') }}
                                @endforeach</td>
                               <td> @foreach ($game->platforms as $platform)
                                {{ ($platform->name ?? '') }}
                                @endforeach</td>
                                <td>{{ ($game->created_at ?? '') }}</td>
                                <td>{{ ($game->updated_at ?? '') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.games.edit', $game) }}" type="button" class="btn btn-warning">Update</a>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                        <a href="{{ route("admin.games.destroy", $game )}}" type="button" class="btn btn-danger delete" onclick="event.preventDefault()">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Release Date</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Price</th>
                            <th>Genres</th>
                            <th>Platforms</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection