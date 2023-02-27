<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rnk Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('nad/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nad/css/style.css') }}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <img src="{{ asset('nad/img/logo.png') }}" alt="">
                    </div>
                </div>
                @if (Route::has('login'))

                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                @auth
                                    <li><a href="{{ url('home') }}">Home</a></li>
                                @else
                                    @if (Route::has('register'))
                                        <li class=""><a href="{{ route('register') }}">Daftar</a></li>
                                    @endif
                                    <li><a href="{{ route('login') }}">Masuk</a></li>

                                </ul>
                            </nav>
                        </div>
                    @endauth
                @endif

                {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ asset('nad/img/hero.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                {{-- <h6>Summer Collection</h6> --}}
                                <h2>RnK Fashion</h2>
                                <p>Adalah sebuah konveksi baju yang memproduksi pakaian dalam jumlah yang banyak.
                                    RnK Fashion berdiri dari tahun 2005. </p>
                                {{-- <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a> --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    {{-- <section class="product spad mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Produk</li>
                        {<li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li> 
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($produk as $data)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">

                        </div>

                         <div class="mt-4">
                            <a href="">
                                <h6>{{ $data->nama }}</h6>
                            </a>
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg"
                                data-setbg="{{ asset($data->gambar[0]->gambar_produk) }}">
                                <img src="{{ asset($data->gambar[0]->gambar_produk) }}" alt="">
                            </div>
                            <div class=""style="padding:5rem;">
                                <a href="">
                                    <h6>{{ $data->nama }}</h6>
                                </a>
                            </div>
                            <div class="blog__item__text">

                                <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                                <h5>The Health Benefits Of Sunglasses</h5>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
    <!-- Banner Section End -->

    <section class="latest spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Produk</span>
                        {{-- <h2>Produk</h2> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk as $data)
                <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ asset($data->gambar[0]->gambar_produk) }}">
                                {{-- <img src="{{ asset($data->gambar[0]->gambar_produk) }}" style="max-height: 250px;width: 48%;" alt=""> --}}
                            </div>
                            <div class="blog__item__text">
                                <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                                <h5>{{ $data->nama}}</h5>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>

    <!-- Product Section Begin -->

    <!-- Product Section End -->

    <!-- Categories Section Begin -->

    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->

    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->

    <!-- Latest Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('nad/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('nad/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nad/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('nad/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('nad/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('nad/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('nad/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('nad/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('nad/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('nad/js/main.js') }}"></script>


</body>

</html>
