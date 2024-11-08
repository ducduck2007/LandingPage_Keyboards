<div class="bg-light titleMargin">
    <div class="heading container d-flex align-items-center justify-content-center">
        <ul class="m-0 d-flex align-items-center gap-4 menu_heading" style="list-style: none;">
            <li class="d-flex align-items-center gap-2 borderRight" onclick="targetDealsale()">
                <i class="fa-solid fa-bolt-lightning"></i>
                <div class="text-dark fw-bold">Deal sale</div>
            </li>

            <li class="d-flex align-items-center gap-2 borderRight">
                <i class="fa-regular fa-keyboard fw-bold"></i>
                <div class="text-dark fw-bold">Bàn phím cơ</div>
            </li>

            <li class="d-flex align-items-center gap-2 borderRight">
                <i class="fa-regular fa-keyboard fw-bold"></i>
                <div class="text-dark fw-bold">Bàn phím văn phòng</div>
            </li>

            <li class="d-flex align-items-center gap-2 borderRight">
                <i class="fa-regular fa-keyboard fw-bold"></i>
                <div class="text-dark fw-bold">Keycaps</div>
            </li>

            <li class="d-flex align-items-center gap-2" style="cursor: pointer;">
                <i class="fa-regular fa-keyboard fw-bold"></i>
                <div class="text-dark fw-bold">Switch</div>
            </li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function() {
        var owl = $(".owl-carousel").owlCarousel({
            items: 5, // Số lượng items hiển thị
            loop: true, // Vòng lặp
            margin: 10, // Khoảng cách giữa các item
            nav: false, // Tắt nút điều hướng mặc định
            dots: false, // Hiển thị dấu chấm
            autoplay: true, // Tự động chạy
            autoplayTimeout: 10000, // Thời gian chờ giữa các slide (ms)
            autoplayHoverPause: true // Tạm dừng khi hover

        });

        // Điều khiển bằng button custom
        $("#nextBtn").click(function() {
            owl.trigger('next.owl.carousel');
        });

        $("#prevBtn").click(function() {
            owl.trigger('prev.owl.carousel');
        });
    });

    const titleElement = document.querySelector('.titleMargin');
    let isScrolling;

    window.addEventListener('scroll', () => {
        titleElement.style.top = '0';
        clearTimeout(isScrolling);
        isScrolling = setTimeout(() => {
            titleElement.style.top = '';
        }, 150);
    });
</script>
