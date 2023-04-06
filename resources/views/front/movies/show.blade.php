@extends('front.layouts.document')

@section('content')
<section>
    <header>
        <h1>
            {{trans('app.movie')}}
        </h1>
    </header>

    <div class="single-game-card-wrapper">
        <article class="game-card">
            <img src="{{asset('storage/images/' . ($movie->image ?? ''))}}">
            <header>
                <h2>
                    {{$movie->name}}
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
        <aside>
            <div>
                @foreach($movie->images as $image)
                    <img src="{{asset('storage/images/' . ($image->name ?? ''))}}">
                @endforeach
            </div>
        </aside>
    </div>
</section>
@endsection