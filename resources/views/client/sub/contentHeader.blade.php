<div class="d-flex justify-content-between gap-4 container-fluid col-11" style="margin-top: 195px;">
    <div class="col-2 d-flex flex-column align-items-center">
        <div class="text-center textSP fw-bold bg-light col-12">Sản phẩm nổi bật</div>
        <div class="cardLEFT col-12">
            @foreach ($header as $hd)
                <p class="card-titleLEFT">{{ $hd->title }}</p>
                <p class="small-desc">
                    {{ $hd->content }}
                </p>

                <img src="{{ $hd->image }}" alt="" class="col-12 sierra">
            @endforeach
        </div>
    </div>

    <div class="col-7">
        <div id="carouselExampleIndicators" class="carousel slide col-12" data-bs-ride="true">

            <!-- Carousel indicators -->
            <div class="carousel-indicators">
                @foreach ($image_header as $index => $ih)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"
                        aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>

            <!-- Carousel inner with images -->
            <div class="carousel-inner">
                @foreach ($image_header as $index => $ih)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $ih->image }}" class="d-block w-100 imgCarousel" height="600px"
                            alt="Slide {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>

            <!-- Carousel controls -->
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
        <div class="text-center textSP fw-bold bg-light col-12">Sản phẩm bán chạy nhất</div>

        @foreach ($best_selling as $bs)
            <div class="cardSP col-12">
                <div class="upper-part">
                    <div class="upper-part-face">
                        <img src="assets/images/demo.png" width="100%" height="100%" alt="...">
                    </div>
                    <div class="upper-part-back pe-3 ps-3" style="font-size: 14px;">{{ $bs->mo_ta }}</div>
                </div>
                <div class="lower-part">
                    <div class="lower-part-face flex-column">
                        <div class="fs-6">{{ $bs->name_product }}</div>
                        <div class="text-danger">{{ $bs->product_price }}₫</div>
                    </div>
                    <div class="lower-part-back">
                        <div class="loader">
                            <svg class="loader-svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 47.94 47.94"
                                style="enable-background:new 0 0 47.94 47.94;" xml:space="preserve">
                                <path style="fill:#fff;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
         c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
         c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
         c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
         c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
         C22.602,0.567,25.338,0.567,26.285,2.486z"></path>
                            </svg>
                        </div>
                        <span class="ms-2">{{ $bs->sales }}</span>
                    </div>

                </div>
            </div>
        @endforeach

        {{-- <div class="cardSP col-12">
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
        </div> --}}
    </div>
</div>
