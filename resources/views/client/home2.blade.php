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

    {{-- Thư viện tìm kiếm --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <title>ĐOÀN THANH NIÊN VÌ HÒA BÌNH</title>
</head>

<body>

    @include('client.sub2.header')
    @include('client.sub.titleMenu')
    @include('client.sub2.contentHeader')
    @include('client.sub2.deal_sale')
    @include('client.sub2.phimCo')
    @include('client.sub2.phimVanPhong')
    @include('client.sub2.keycaps')
    @include('client.sub2.switch')
    @include('client.sub.tk_view')
    @include('client.sub.footer')

    @include('client.sub2.modal')
    @include('client.sub.scrollTop')

    <!-- Modal -->
    <div class="modal fade" id="modalTbao" tabindex="-1" aria-labelledby="modalTbaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card">
                <!-- Header -->
                <div class="modal-header tools">
                    <div class="circle">
                        <span class="red box"></span>
                    </div>
                    <div class="circle">
                        <span class="yellow box"></span>
                    </div>
                    <div class="circle">
                        <span class="green box"></span>
                    </div>
                </div>
                <!-- Body -->
                <div class="modal-body card__content">
                    <p class="title" id="modalTbaoLabel">Thông báo</p>
                    <hr>
                    <p class="content">Thượng đế vui lòng đăng nhập để thao tác ạ! 🫰🏼</p>
                </div>
                <!-- Footer -->
                <div class="modal-footer card__content">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <a href="{{ route('client.login') }}" type="button" class="btn btn-danger">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        #modalTbao .card {
            width: auto;
            margin: 0 auto;
            background-color: #f4f4f3;
            border-radius: 8px;
            z-index: 1;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        #modalTbao .card::after {
            position: absolute;
            content: '';
            background-color: #454a50;
            width: 50px;
            height: 100px;
            z-index: -1;
            border-radius: 8px;
        }

        #modalTbao .tools {
            display: flex;
            align-items: center;
            padding: 9px;
            border-radius: 8px;
            background: #454a50;
            margin-top: -2px;
        }

        #modalTbao .circle {
            padding: 0 4px;
        }

        #modalTbao .card__content {
            margin: 0px;
            border-radius: 8px;
            background: #f4f4f3;
            padding: 10px;
        }

        #modalTbao .title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        #modalTbao .content {
            margin-top: 10px;
            font-size: 14px;
        }

        #modalTbao .box {
            display: inline-block;
            align-items: center;
            width: 10px;
            height: 10px;
            padding: 1px;
            border-radius: 50%;
        }

        #modalTbao .red {
            background-color: #ff605c;
        }

        #modalTbao .yellow {
            background-color: #ffbd44;
        }

        #modalTbao .green {
            background-color: #00ca4e;
        }
    </style>


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
    <script>
        // Hàm mở modal
        function showAlertNotLogin() {
            var myModal = new bootstrap.Modal(document.getElementById('modalTbao'));
            myModal.show(); // Hiển thị modal
        }
    </script>

</body>

</html>
