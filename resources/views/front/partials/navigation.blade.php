<nav>
    <ul>
        {{-- <li>
            <a href="<?= url('index.php'); ?>">Namai</a>
        </li> --}}
        <li class='dropdown'>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <a href="{{route('front.movies.index')}}">{{Str::ucfirst(trans('app.movies'))}}</a>
            <ul class='dropdown-list'>
                <li>
                    <a href="{{route('front.movies.index')}}">{{Str::ucfirst(trans('app.all'))}}</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
