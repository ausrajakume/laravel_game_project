@extends('user.layouts.document')
@section('content')

@foreach ($games as $game)
<div class="game-card">
    <h5>{{$game->title ?? ''}}</h5>
    <img src="{{ asset('storage/images/'.($game->image ?? ''))}}" width="200px" height="300px" alt="">
    <div class="button-container">
       @if (Auth::check())
           <a href="{{route('user-game', $game)}}"><button>Add to Cart</button></a>
       @endif 
        <a href="{{route('user.games.show', $game)}}"><button>View</button></a>
    </div>
</div>
    
@endforeach
@endsection