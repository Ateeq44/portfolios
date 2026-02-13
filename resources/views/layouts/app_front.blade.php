<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script src="https://kit.fontawesome.com/f5eb8f10bc.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img class="logo" src="{{ asset('images/logo.png') }}">
            </a>
            <a class="btn btn-gradient-primary text-white ms-2 px-4 m-block" style="display: none;" href="#contact">Start Your Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
       href="{{ route('home') }}">
        Home
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('portfolios.index') ? 'active' : '' }}"
       href="{{ route('portfolios.index') }}">
        Portfolio
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('portfolios.about') ? 'active' : '' }}"
       href="{{ route('portfolios.about') }}">
        About Us
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('portfolios.contact') ? 'active' : '' }}"
       href="{{ route('portfolios.contact') }}">
        Contact Us
    </a>
</li>
                    <li class="nav-item m-hidden"><a class="btn btn-gradient-primary text-white ms-2 px-4" href="#contact">Start Your Project</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="" style="margin-top: 65px;">
        @yield('content')
    </main>

    <!-- 8. CTA / CONTACT SECTION -->
    <section id="contact" class="py-5 bg-dark text-white">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold">Ready to build something extraordinary?</h2>
                    <p class="text-white opacity-75 mb-0">
                        Let's discuss how we can transform your vision into a market-leading digital product. 
                        Free consultation and technical assessment included.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#" class="btn btn-light btn-lg px-5 w-100 fw-bold">Schedule a Call</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 border-top border-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img style="width: 150px;" src="{{ asset('images/logo-white.png') }}">
                </div>
                <div class="col-md-4">
                    <p class="opacity-75 small mt-3">Engineering digital excellence since 2022.</p>
                </div>
                <div class="col-md-4 fdfdsdsf d-flex justify-content-end align-items-center">
                    <p class="opacity-75 small mb-0">&copy; {{ date('Y') }} <a class="text-white" href="{{ url('/') }}"> <strong>ARU WebTech</strong></a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f5eb8f10bc.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
