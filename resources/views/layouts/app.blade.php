<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <====== CSS ======> -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uniform.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/online.css') }}">
    <!-- <====== JS ======> -->
    <link rel="stylesheet" href="{{ asset('assets/js/script.js') }}">
    <!-- <====== Thư viện ======> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <title>ĐOÀN THANH NIÊN VÌ HÒA BÌNH</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navBarNoneScroll">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Đƚԋɳιҽɳ VHB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                </li>
                            @endif
                        @else
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function targetDealsale() {
            document.getElementById("scrollDealsale").scrollIntoView({
                behavior: "smooth"
            });
        }

        function targetPhimCo() {
            document.getElementById("scrollPhimCo").scrollIntoView({
                behavior: "smooth"
            });
        }

        function targetPhimVP() {
            document.getElementById("scrollPhimVP").scrollIntoView({
                behavior: "smooth"
            });
        }

        function targetKeycaps() {
            document.getElementById("scrollKeycaps").scrollIntoView({
                behavior: "smooth"
            });
        }

        function targetSwitch() {
            document.getElementById("scrollSwitch").scrollIntoView({
                behavior: "smooth"
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            function initCarousel(selector, items, nextBtn, prevBtn) {
                var owl = $(selector).owlCarousel({
                    items: items,
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 10000,
                    autoplayHoverPause: true
                });

                $(nextBtn).click(function() {
                    owl.trigger('next.owl.carousel');
                });
                $(prevBtn).click(function() {
                    owl.trigger('prev.owl.carousel');
                });
            }

            // Khởi tạo các carousel với các cấu hình khác nhau
            initCarousel("#panel1-carousel", 5, "#nextBtn1", "#prevBtn1");
            initCarousel("#panel2-carousel", 6, "#nextBtn3", "#prevBtn3");
            initCarousel("#cardPhimCo", 7, "#nextBtn2", "#prevBtn2");
            initCarousel("#panel3-carousel", 4, "#nextBtn2", "#prevBtn2");
            initCarousel("#cardPhimVanPhong", 7, "#nextBtn5", "#prevBtn5");
            initCarousel("#cardKeycaps", 7, "#nextBtn6", "#prevBtn6");
            initCarousel("#cardSwitch", 6, "#nextBtnS", "#prevBtnS");
        });

        const titleElement = document.querySelector('.titleMargin');
        const navBar = document.getElementById('navBarNoneScroll');
        const headerScroll = document.getElementById('headerScroll');
        let isScrolling;

        window.addEventListener('scroll', () => {
            // Kiểm tra nếu đang cuộn trang
            if (window.scrollY > 0) {
                // Ẩn navBar bằng cách đặt margin-top là -56px
                navBar.style.marginTop = '-56px';

                // Set top của headerScroll về 0
                headerScroll.style.top = '0';

                // Nếu navBar có margin-top -56px, đặt titleElement với top là 95px
                titleElement.style.top = '95px';
            } else {
                // Khi cuộn lên đầu trang
                // Hiển thị lại navBar
                navBar.style.marginTop = '';

                // Đặt lại top của headerScroll về mặc định
                headerScroll.style.top = '';

                // Đặt lại top của titleElement về giá trị ban đầu
                titleElement.style.top = '';
            }

            // Clear timeout cũ và đặt lại timeout mới khi người dùng dừng cuộn
            clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                // Khi dừng cuộn, reset titleElement về giá trị mặc định nếu đang ở đầu trang
                if (window.scrollY === 0) {
                    titleElement.style.top = '';
                }
            }, 250);
        });
    </script>
</body>

</html>
