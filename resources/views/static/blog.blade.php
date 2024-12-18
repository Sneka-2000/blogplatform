<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO meta tags -->
    <meta name="description"
        content="A modern, responsive blog template for business, agency, and multipurpose use. Built with Bootstrap 4 for optimal performance.">
    <meta name="keywords"
        content="blog, business, company, agency, modern, responsive, bootstrap 4, multipurpose, creative">
    <meta name="author" content="themefisher.com">

    <title>Blog</title>


    <!-- Open Graph Meta Tags for social sharing -->
    <meta property="og:title" content="Blog - Modern Business and Agency Template">
    <meta property="og:description"
        content="A modern, responsive blog template for business, agency, and multipurpose use, built with Bootstrap 4.">
    <meta property="og:image" content="URL_to_image_for_preview.jpg">
    <meta property="og:url" content="URL_of_the_page">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags for better Twitter sharing -->
    <meta name="twitter:title" content="Blog - Modern Business and Agency Template">
    <meta name="twitter:description"
        content="A modern, responsive blog template for business, agency, and multipurpose use, built with Bootstrap 4.">
    <meta name="twitter:image" content="URL_to_image_for_preview.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <base href="/public">

    <!-- Bootstrap CSS (only once) -->
    <link rel="stylesheet" href="assets/static/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/static/plugins/themify/css/themify-icons.css">
    <link rel="stylesheet" href="assets/static/plugins/fontawesome/css/all.css">

    <!-- Popup & Carousel CSS -->
    <link rel="stylesheet" href="assets/static/plugins/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="assets/static/plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/static/plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/static/css/style.css">


</head>

<body>

    <!-- Header Start -->
    <style>
        /* General Navbar Styling */
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .navbar-toggler {
            border: none;
            background: none;
        }

        .navbar-toggler .fa-bars {
            font-size: 1.5rem;
            color: #333;
        }

        /* Links Styling */
        .nav-link {
            color: #333;
            font-size: 1rem;
            padding: 5px 10px;
        }

        .nav-link:hover {
            color: #007bff;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background-color: #f8f9fa;
            border: none;
        }

        .dropdown-item:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Desktop View: Inline Links */
        <blade media|%20(min-width%3A%20992px)%20%7B%0D>.navbar-nav {
            flex-direction: row;
        }

        .nav-item {
            margin-left: 15px;
        }
        }

        /* Mobile View: Stack Links */
        <blade media|%20(max-width%3A%20991.98px)%20%7B%0D>.navbar-collapse {
            text-align: center;
        }

        .nav-item {
            margin-bottom: 15px;
        }

        .dropdown-menu {
            text-align: left;
        }

        .nav-link {
            display: block;
            font-size: 1.1rem;
        }
        }

    </style>
    <header class="navigation">
        <nav class="navbar navbar-expand-lg py-4" id="navbar">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <span>Blog</span>
                </a>

                <!-- Toggler for mobile -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                    aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Navigation links -->
                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('static.blog') }}" id="blogLink">
                                Blog
                            </a>


                        </li>
                         <li class="nav-item">
                            @if(Route::has('login'))
                                @auth
                                    @if(Auth::user()->role === 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin
                                Dashboard</a></li>
                    @elseif(Auth::user()->role === 'author')
                        <li><a href="{{ route('author.dashboard') }}" class="nav-link">Author Dashboard</a>
                        </li>
                    @else
                        <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                        @endif

                        <li>
                            <form action="{{ route('logout') }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link"
                                    style="padding: 0; border: none; background: none;">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                        @if(Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                        @endauth
                        @endif
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Header Close -->

    <div class="main-wrapper ">

        <section class="page-title bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block text-center">
                            <span class="text-white">News details</span>
                            <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
                                <li class="list-inline-item"><span class="text-white">/</span></li>
                                <li class="list-inline-item"><a href="/" class="text-white-50">News details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <section class="section blog-wrap bg-gray">
            <div class="container">

                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="blog-item">
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                    alt="{{ $blog->title }}" class="img-fluid rounded">
                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray py-1 px-2">
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-pencil-alt mr-2"></i>Creative
                                        </span>
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-time mr-1"></i>{{ $blog->created_at }}
                                        </span>
                                    </div>

                                    <h3 class="mt-3 mb-3">
                                        <a href="#">{{ $blog->title }}</a>
                                    </h3>
                                    <p class="mb-4">
                                        {{ \Illuminate\Support\Str::limit($blog->description, 150) }}
                                    </p>
                                    <td>
                                    </td>
                                    <a href="{{ route('blogs.show', $blog->id) }}"
                                        class="btn btn-small btn-main btn-round-full">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="pagination">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>



    </div>

    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="assets/static/plugins/jquery/jquery.js"></script>
    <script src="assets/static/js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="assets/static/plugins/bootstrap/js/popper.js"></script>
    <script src="assets/static/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--  Magnific Popup-->
    <script src="assets/static/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/static/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="assets/static/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="assets/static/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="assets/static/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="assets/static/js/script.js"></script>

</body>

</html>
