@extends('front.layouts.document')

@section('content')
<section>
    <header>
        
    <a href="table.blade.php">Filmai</a>

    </header>
   
    <div class="game-cards">
        @foreach ($movies as $movie)
   
            <article class="game-card game-card-hover">
                <a href="../movies/show.blade.php"></a>
                <header>
                    <img src="{{asset('storage/images/' . ($movie->image ?? ''))}}">
                    <h2>
                        {{ ($movie->title ?? '') }}
                    </h2>
                </header>
                <div class="game-card-body">
                    <div class="game-card-details">
                        <div>
                            <span>{{Str::ucfirst(trans('app.release_date'))}}</span>
                            <span>{{ ($movie->release_date ?? '') }}</span>
                        </div>
                        <div>
                            <span>{{Str::ucfirst(trans('app.runtime'))}}</span>
                            <span>{{ ($movie->runtime ?? '')}} {{trans('app.min')}}</span>
                        </div>
                        <div>
                            <span>{{ Str::ucfirst(trans('app.rating')) }}</span>
                            <span>{{ ($movie->rating ?? '') }}</span>
                        </div>
                        <div>
                            <span>{{ Str::ucfirst(trans('app.genres')) }}</span>
                            <span>{{ ($movie?->genres->pluck('name')->implode(', ')) }}</span>
                        </div>
                        <div>
                            <span>{{ Str::ucfirst(trans('app.languages')) }}</span>
                            <span>{{ ($movie?->languages->pluck('name')->implode(', ')) }}</span>
                        </div>
                        <div>
                            <span>{{ Str::ucfirst(trans('app.countries')) }}</span>
                            <span>{{ ($movie?->countries->pluck('name')->implode(', ')) }}</span>
                        </div>
                    </div>
                    <div class="game-card-description">
                        {{ ($movie->description ?? '') }}
                    </div>
                </div>
            </article>
        @endforeach

    </div>
</section>
@endsection