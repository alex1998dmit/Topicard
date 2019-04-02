<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--ui jquery  --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    {{-- autocomplete --}}
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('topics') }}" class="nav-link">Topics</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user', ['id' => Auth::id()]) }}" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline">
                                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" id="search_categories">
                            </form>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
    </div>
    <script>
        $(document).ready(function(){
            let url_search_topics = "{{  route('topics.search') }}";
            $(document).on('keyup', '#search_categories', function(){
                var query = $(this).val();
                let results;
                console.log(query);
                $.ajax({
                    url:url_search_topics,
                    type: 'GET',
                    data:{ name: query },
                    dataType: 'json',
                    delay: 200,
                    success: function(data) {
                        console.log(data);
                        let arrayResult = data.map(el => el.title);
                        if(arrayResult.length) {
                            $('#search_categories').autocomplete({
                                source: arrayResult,
                                select: function( event, ui ) {
                                    let selected_tag = ui.item.value;
                                    let selected = data.filter(el =>  {return el.title === selected_tag });
                                    let selected_id = selected[0].id;
                                    console.log()
                                    window.location.replace(`http://localhost:8888/topicard/public/topic/${selected_id}`);
                                },
                            })
                        }
                    },
                });
            });
        });
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
