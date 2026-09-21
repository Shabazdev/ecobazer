<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('title', 'Ecobazar | Organic Store')</title>
        <link rel="icon" type="image/png" href="{{ asset('src/images/favicon/favicon-16x16.png') }}" />
        <link rel="stylesheet" href="{{ asset('src/lib/css/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('src/lib/css/bvselect.css') }}" />
        <link rel="stylesheet" href="{{ asset('src/lib/css/venobox.css') }}" />
        <link rel="stylesheet" href="{{ asset('src/lib/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />
        @stack('styles')
    </head>

    <body>
        <div class="loader">
            <div class="loader-icon">
                <img src="{{ asset('src/images/loader.gif') }}" alt="loader" />
            </div>
        </div>

        <!-- Header Section -->
        <header class="header header--two header--four">
            <div class="header__top">
                <div class="container">
                    <div class="header__top-content">
                        <div class="header__top-left">
                            <p class="font-body--sm">
                                <span>
                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 8.36364C16 14.0909 8.5 19 8.5 19C8.5 19 1 14.0909 1 8.36364C1 6.41068 1.79018 4.53771 3.1967 3.15676C4.60322 1.77581 6.51088 1 8.5 1C10.4891 1 12.3968 1.77581 13.8033 3.15676C15.2098 4.53771 16 6.41068 16 8.36364Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 10.8182C9.88071 10.8182 11 9.71925 11 8.36364C11 7.00803 9.88071 5.90909 8.5 5.90909C7.11929 5.90909 6 7.00803 6 8.36364C6 9.71925 7.11929 10.8182 8.5 10.8182Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                Store Location: Lincoln- 344, Illinois, Chicago, USA
                            </p>
                        </div>
                        <div class="header__top-right">
                            <div class="header__in">
                                @auth
                                    <a href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                                    <span>/</span>
                                    @if(auth()->user()->is_admin)
                                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                                        <span>/</span>
                                    @endif
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-dark text-decoration-none">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">Sign in</a>
                                    <span>/</span>
                                    <a href="{{ route('register') }}">Sign up</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__center">
                <div class="container">
                    <div class="header__center-content">
                        <div class="header__brand">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('src/images/logo.png') }}" alt="brand-logo" />
                            </a>
                        </div>
                        <form action="{{ route('shop') }}" method="GET">
                            <div class="header__input-form">
                                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" />
                                <span class="search-icon">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.4999 18L13.8749 14.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <button type="submit" class="search-btn button button--md">Search</button>
                            </div>
                        </form>
                        <div class="header__cart">
                            <div class="header__cart-item">
                                <a class="fav" href="{{ route('wishlist.index') }}">
                                    <svg width="25" height="23" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.9996 16.5451C-6.66672 7.3333 4.99993 -2.6667 9.9996 3.65668C14.9999 -2.6667 26.6666 7.3333 9.9996 16.5451Z" stroke="#1A1A1A" stroke-width="1.5"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="header__cart-item">
                                <div class="header__cart-item-content" id="cart-bag">
                                    <a href="{{ route('cart.index') }}" class="cart-bag text-decoration-none text-dark d-flex align-items-center">
                                        <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.3333 14.6667H7.08333L4.25 30.25H29.75L26.9167 14.6667H22.6667M11.3333 14.6667V10.4167C11.3333 7.28705 13.8704 4.75 17 4.75V4.75C20.1296 4.75 22.6667 7.28705 22.6667 10.4167V14.6667M11.3333 14.6667H22.6667M11.3333 14.6667V18.9167M22.6667 14.6667V18.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <div class="header__cart-item-content-info ms-2">
                                        <h5>Shopping cart:</h5>
                                        <a href="{{ route('cart.index') }}" class="price text-decoration-none text-dark">View Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <div class="container">
                    <div class="header__bottom-content">
                        <div class="header__bottom-left">
                            <ul class="header__menu">
                                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') ? 'active' : '' }}">Shop</a></li>
                                <li><a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'active' : '' }}">Blog</a></li>
                                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="header__bottom-right">
                            <div class="header__support">
                                <span>
                                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.11 21.04 20.41C20.53 20.94 19.98 21.31 19.38 21.53C18.78 21.75 18.15 21.86 17.5 21.86C16.5 21.86 15.46 21.62 14.38 21.14C13.3 20.66 12.21 20.01 11.12 19.19C10.02 18.37 8.96 17.44 7.93 16.41C6.9 15.38 5.97 14.32 5.15 13.22C4.33 12.13 3.68 11.04 3.2 9.96C2.72 8.88 2.48 7.84 2.48 6.84C2.48 6.2 2.59 5.57 2.81 4.97C3.03 4.37 3.4 3.82 3.93 3.32C4.53 2.74 5.2 2.45 5.94 2.45C6.21 2.45 6.48 2.51 6.73 2.63C6.98 2.75 7.2 2.93 7.37 3.17L10.04 6.95C10.21 7.19 10.33 7.41 10.4 7.61C10.47 7.81 10.5 8 10.5 8.17C10.5 8.41 10.43 8.65 10.29 8.88C10.15 9.11 9.96 9.35 9.72 9.59L8.71 10.63C8.59 10.75 8.53 10.89 8.53 11.05C8.53 11.13 8.55 11.21 8.58 11.28C8.61 11.35 8.65 11.41 8.68 11.46C9.28 12.54 10 13.58 10.84 14.58C11.68 15.58 12.72 16.3 13.96 16.94C14.03 16.97 14.1 17.01 14.18 17.04C14.26 17.07 14.34 17.09 14.43 17.09C14.61 17.09 14.76 17.03 14.88 16.91L15.91 15.9C16.15 15.66 16.39 15.47 16.62 15.33C16.85 15.19 17.09 15.12 17.33 15.12C17.5 15.12 17.69 15.15 17.89 15.22C18.09 15.29 18.31 15.41 18.55 15.58L22.33 18.25C22.57 18.42 22.75 18.64 22.87 18.89C22.99 19.14 23.05 19.4 23.05 19.67V18.33H21.97Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <h5>(219) 555-0193</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        @yield('content')

        <!-- Footer Section -->
        <footer class="footer">
            <div class="container">
                <div class="footer__content">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer__widget">
                                <a href="{{ route('home') }}" class="footer__logo">
                                    <img src="{{ asset('src/images/logo.png') }}" alt="logo" />
                                </a>
                                <p class="font-body--sm">Morbi cursus porttitor enim lobortis molestie. Duis gravida turpis dui, eget bibendum magna congue nec.</p>
                                <div class="footer__contact">
                                    <p>(219) 555-0193</p>
                                    <span>or</span>
                                    <p>proxy@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="footer__widget">
                                <h5>My Account</h5>
                                <ul>
                                    <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                    <li><a href="{{ route('order.history') }}">Order History</a></li>
                                    <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="footer__widget">
                                <h5>Helps</h5>
                                <ul>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('faq') }}">Faq</a></li>
                                    <li><a href="{{ route('about') }}">Terms & Condition</a></li>
                                    <li><a href="{{ route('about') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="footer__widget">
                                <h5>Proxy</h5>
                                <ul>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li><a href="{{ route('blogs') }}">Product</a></li>
                                    <li><a href="{{ route('track.order' ?? 'contact') }}">Track Order</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer__widget">
                                <h5>Download Mobile App</h5>
                                <p class="font-body--sm">Save $3 with App & New user only</p>
                                <div class="footer__apps">
                                    <a href="#"><img src="{{ asset('src/images/icons/play-store.svg') }}" alt="playstore" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JS Scripts -->
        <script src="{{ asset('src/lib/js/jquery.min.js') }}"></script>
        <script src="{{ asset('src/lib/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('src/lib/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('src/lib/js/venobox.min.js') }}"></script>
        <script src="{{ asset('src/js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>
