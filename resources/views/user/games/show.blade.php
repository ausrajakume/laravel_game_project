@extends('user.layouts.document')
@section('content')


<div class="show-game-card">
    <h5>{{$game->title ?? ''}}</h5>
    <img src="{{ asset('storage/images/'.($game->image ?? ''))}}"  alt="">
    <div class="game-info">
        <ul>
            <li>{{$game->title}}</li>
            <li>Release Date: {{$game->release_date}}</li>
            <li>Price: {{$game->price/100}} Eur</li>
            <li>Platforms: {{$game->platforms->pluck('name')->implode(', ')}}</li>
            <li>Game description: <p>{{$game->description}}</p></li>
            <li class="gp-img-container">Gameplay images: @foreach ($game->images as $image)
                <img src="{{ asset('storage/images/' . ($image->name) ?? '') }}" alt="" width="800px" height="500px" >
            @endforeach</li>
            <li><iframe width="800" height="500" src="{{$game->iframe ?? ''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></li>


        </ul>
    </div>
</div>
    
@endsection