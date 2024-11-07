<div class="d-flex justify-content-between gap-4 container-fluid col-11" style="margin-top: 195px;">
    <div class="col-2 d-flex flex-column align-items-center">
        <div class="text-center textSP fw-bold bg-light col-12">Thông tin sản phẩm</div>
        <div class="cardLEFT col-12">
            <p class="card-titleLEFT">Tên sản phẩm</p>
            <p class="small-desc">
                Giá sản phẩm
            </p>

            <img src="assets/images/sierra.jpg" alt="" class="col-12 sierra">
        </div>
    </div>

    <div class="col-7">
        <div id="carouselExampleIndicators" class="carousel slide col-12" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($image_header as $index => $ih)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $ih->image }}" class="d-block w-100 imgCarousel" height="600px" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-2 d-flex flex-column justify-content-between align-items-center sanPhamBNN">
        <div class="text-center textSP fw-bold bg-light col-12">Sản phẩm có lượt bán nhiều nhất</div>

        <div class="cardSP col-12">
            <div class="upper-part">
                <div class="upper-part-face">
                    <img src="assets/images/demo.png" width="100%" height="100%" alt="...">
                </div>
                <div class="upper-part-back pe-3 ps-3" style="font-size: 14px;">Trên tay bàn phím cơ KO 5075B Plus
                    Transparent ASA Black
                    Piano Pro với
                    thiết kế TKL layout 75% có núm người dùng có thể thoải mái thao tác với thiết bị</div>
            </div>
            <div class="lower-part">
                <div class="lower-part-face flex-column">
                    <div class="fs-6">AKKO 5075B Plus</div>
                    <div class="text-danger">1.690.000₫</div>
                </div>
                <div class="lower-part-back">Lượt bán: 152.6k</div>
            </div>
        </div>

        <div class="cardSP col-12">
            <div class="upper-part">
                <div class="upper-part-face">
                    <img src="assets/images/demo.png" width="100%" height="100%" alt="...">
                </div>
                <div class="upper-part-back pe-3 ps-3" style="font-size: 14px;">Trên tay bàn phím cơ KO 5075B Plus
                    Transparent ASA Black
                    Piano Pro với
                    thiết kế TKL layout 75% có núm người dùng có thể thoải mái thao tác với thiết bị</div>
            </div>
            <div class="lower-part">
                <div class="lower-part-face flex-column">
                    <div class="fs-6">AKKO 5075B</div>
                    <div class="text-danger">1.690.000₫</div>
                </div>
                <div class="lower-part-back">Lượt bán: 32.6k</div>
            </div>
        </div>
    </div>
</div>
