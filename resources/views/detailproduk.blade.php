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
                {{-- @if (Route::has('login'))

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
                @endif --}}

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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-{{ $images[0]->id }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset($images[0]->gambar_produk) }}">
                                    </div>
                                </a>
                            </li>
                            @foreach ($images->skip(1) as $image)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-{{ $image->id }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset($image->gambar_produk) }}">
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-{{ $images[0]->id }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset($images[0]->gambar_produk) }}" alt="">
                                </div>
                            </div>

                            @foreach ($images->skip(1) as $image)
                            <div class="tab-pane " id="tabs-{{ $image->id }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset($image->gambar_produk) }}" alt="">
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $produk->nama }}</h4>
                            
                            <h3>Rp. {{ number_format($produk->harga,2,',','.') }} </h3>
                            <p>{!! $produk->deskripsi !!}</p>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product__details__option">
                                        <div class="product__details__option__size">
                                            <span>Bahan : </span>
                                            @foreach ($bahan as $data)
                                            {{ $data->bahan->nama_bahan }} |
                                            @endforeach
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-6">
                                    <div class="product__details__option__size">
                                        <div class="product__details__option__size">
                                        <span>Warna:</span>
                                        @foreach ($warna as $data)
                                            {{ $data->warna->nama_warna }} |
                                        @endforeach
                                        </div>
                                    </div>
    
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    
    <!-- Related Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="mb-3">Pesan Sekarang
                            <a href="https://wa.me/message/N5BL37MZJEV4J1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                  </svg>
                            </a>
                        </p>
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