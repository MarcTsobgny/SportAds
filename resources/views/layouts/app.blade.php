<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} </title>
    <link rel="icon" href="{{ Storage::url('images/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS Pour la rehcherche-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!------ Include the above in your HEAD tag ---------->

</head>

<body style="background-color: rgba(158, 185, 158,0.2)">

    <div id="app">

        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        {{-- navbar --}}
        <div class="bg-dark">
            <div class="container">
                <div class="row">
                    <nav class="col navbar  navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ Storage::url('images/logo.png') }}" width="40" height="30" alt="Site logo">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="navbarContent" class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                {{-- ACCUEIl --}}
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                                </li>

                                {{-- categories --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('home') }}"
                                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Catégories
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-cat" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('home') }}" class="dropdown-item ">
                                            Toute les catégories
                                            <span class="badge">

                                        </a>
                                        <div class="dropdown-header">Championat</div>
                                        @forelse (getCategories() as $cat )

                                            <a href="{{ route('home.cat', [$cat->id]) }}" class="dropdown-item ">
                                                {{ $cat->name }}
                                                <span class="badge">

                                                    <img src="{{ Storage::url(getImage($cat->image_id)->path) }}"
                                                        width="19" height="19" alt="">


                                                </span>
                                            </a>


                                        @empty
                                            <div class="alert alert-danger font-bold" role="alert">Pas de catégories</div>
                                        @endforelse

                                        <div class="dropdown-header">Pays</div>

                                        @auth
                                            @if (Auth::user()->is_admin==1) 
                                             <div class=" dropdown-item bg-dark">
                                                <a href="{{ route('cat.edit') }}" class="text-danger">
                                                Modifier
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                                  </svg>
                                                </a>
                                            </div>
                                                
                                            @endif
                                        @endauth
                                      

                                </li>

                                @auth
                                    @if (isEditor(Auth::user()->id))

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('post.create') }}">
                                                Ajouter une annonce
                                            </a>
                                        </li>
                                    @else

                                        <li class="nav-item">
                                            <a class="nav-link " href="#">
                                                Devenir redacteur?
                                            </a>
                                        </li>


                                    @endif


                                    {{-- Notifications drowBox --}}

                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-light " href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Notifications <i class="fa fa-bell "
                                                style="{{ getUnReadNots(Auth::user()->id)->count() > 0 ? 'color:red' : '' }}"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-nots ">

                                            <li class="head text-light bg-dark">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12">
                                                        <span>Notification(s)
                                                            <span
                                                                class="badge badge-danger">{{ getUnReadNots(Auth::user()->id)->count() }}</span>
                                                        </span>
                                                        <a href="" class="float-right text-light">Mark all as read</a>
                                                    </div>
                                            </li>


                                            @forelse (getNots(Auth::user()->id) as $not)

                                                <li class="notification-box {{ $not->read == 0 ? 'bg-gray' : '' }}">

                                                    <a class="row"
                                                        href="{{ route('notification.read', ['post_id' => $not->post_id, 'not_id' => $not->id]) }}">

                                                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                            <img src="{{ Storage::url(getImage(getPost($not->post_id)->image_id)->path) }}"
                                                                class="w-100 rounded-b-lg">
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8">

                                                            <h4 class="text-info">
                                                                {{ getUser(getPost($not->post_id)->user_id)->name }}</h3>
                                                                <h5 class="text-success">
                                                                    {{ $not->title }}
                                                                </h5>
                                                                <div>
                                                                    {{ $not->content }}
                                                                </div>
                                                                <small
                                                                    class="text-danger ">
                                                                    {{ Carbon\Carbon::parse($not->created_at)->diffForHumans() }}
                                                                    </small>
                                                        </div>

                                                    </a>
                                                </li>

                                            @empty
                                                <span> Pas de notifications</span>
                                            @endforelse

                                            <li class="footer bg-dark text-center">
                                                <a href="" class="text-light">View All</a>
                                            </li>
                                        </ul>

                                    </li>


                                @endauth
                            </ul>

                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else

                                    {{-- Les editeurs --}}
                                    @if (getAdminUser()->id == Auth::user()->id)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" href="#">Les éditeurs</a>

                                            <ul class="dropdown-menu dropdown-menu-right" id="editorBox"
                                                aria-labelledby="navbarDropdown">
                                                <li class="head text-light bg-dark">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-12">
                                                            <span>Les éditeurs
                                                                <span
                                                                    class="badge badge-danger">{{ getEditors()->count() }}</span>
                                                            </span>
                                                        </div>
                                                </li>
                                                @forelse (getEditors() as $editor )

                                                    <a class="dropdown-item" href="{{ route('editor',['id'=> $editor->id]) }}">
                                                        {{ $editor->name }}
                                                       <span> <strong class="text-danger">{{  getPosts($editor->id)->count() }} </strong> Post{{  getPosts($editor->id)->count()>1 ?'s':'' }}</span> 
                                                    </a>
                                                @empty
                                                    {{-- <span class="alert alert-danger"> Pas d'éditeur</span> --}}
                                                @endforelse



                                            </ul>

                                        </li>

                                    @endif

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>

                        </div>

                    </nav>
                </div>
            </div>
        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('extra-js')
</body>

</html>
