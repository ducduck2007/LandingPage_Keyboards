<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body>

    @include('client.sub.header')
    @include('client.sub.titleMenu')
    @include('client.sub.contentHeader')
    @include('client.sub.deal_sale')
    @include('client.sub.phimCo')
    @include('client.sub.phimVanPhong')
    @include('client.sub.keycaps')
    @include('client.sub.switch')
    @include('client.sub.tk_view')
    @include('client.sub.footer')

    @include('client.sub.modal')
    @include('client.sub.scrollTop')

    @include('client.loginSub')

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
        let isScrolling;

        window.addEventListener('scroll', () => {
            titleElement.style.top = '0';
            clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                titleElement.style.top = '';
            }, 250);
        });
    </script>

</body>

</html>
