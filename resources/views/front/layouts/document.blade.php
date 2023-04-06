<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.partials.head')
</head>

<body>
    <header>
        @include('front.partials.navigation')
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        @include('front.partials.footer')
    </footer>
</body>

</html>