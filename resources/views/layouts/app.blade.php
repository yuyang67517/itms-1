<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BLOG') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        
        .footer{  
            width: 1300px;
            bottom: 0;
        }
        .button-footer{
            
            color: #4a4848;
        }
        .header{
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), 
            var(--bs-bg-opacity)) !important;
            text-align: center;
            color: white;
        }
        


    </style>
    <!-- Header starts here 
   <header>
    <h3>Welcome to the UECS 3294 AWAD BLOG website!</h3>
   </header>
     Header ends --> 
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav" id="navbar-nav-left">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Article
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/articles">All Article</a></li>
                    <li><a class="dropdown-item" href="{{ url('/articles/create') }}">Add New Article</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/categories">All Category</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="{{ url('/categories/create') }}">Add New Category</a></li>
                    @endif
                </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                        
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        @if (Auth::check() && Auth::user()->role == "admin")
                                            (admin)
                                        @endif

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    </nav>
    
    <div id="app">
        <main class="py-4">
            @yield('content')
    </div>
    <!-- Page footer begins -->

 <footer class="bg-light text-center text-lg-start">
    <div class="jumbotron-footer">    
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase"><strong>About Us</strong></h5>

            <p>
            This blog website is built by our members with Laravel framework for the assignemnt of the course UECS 3294 Advance Web Application Development.
            </p>
            <ul>
                <li>Chan Liang Jye</li>
                <li>Eric Lim Yu Yang</li>
                <li>Lim Jun Tong</li>
                <li>Ng Li Ren</li>
                <li>Teh Jia Rong</li>
            </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase"><strong>Contact Us</strong></h5>

            <p>
            Should you have any queries, please do not hesitate to contact us. Below are some ways to reach us.
            </p>
            <p>
            <i class="fa fa-envelope"></i> customercare@UECS3294.com 
            </p>
            <p>
            <i class="fa fa-phone"></i> +60 12345 6789
            </p>
        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

        <div class="footer">
            <div class="container text-center">
                
                <div class="container p-4 pb-0">
        <!-- Section: Social media -->
                    <section>
                        <p><strong>Follow Us</strong></p>
                        <button onclick="location.href='http://www.facebook.com'" class="btn"><i class="fa fa-facebook fa-3x"></i></button>
                        <button onclick="location.href='http://www.instagram.com'" class="btn"><i class="fa fa-instagram fa-3x"></i></button>
                        <button onclick="location.href='http://www.twitter.com'" class="btn"><i class="fa fa-twitter fa-3x"></i></button>
                        <button onclick="location.href='http://www.github.com'" class="btn"><i class="fa fa-github fa-3x"></i></button>
                        
                    </section>
                    <!-- Section: Social media -->
                </div>
            <div class="mt-3">
                &copy; {{ date('Y')}}. All rights reserved.
            </div>
                
            </div>
        </div>
    </div>
 </footer>

</body>
</html>
