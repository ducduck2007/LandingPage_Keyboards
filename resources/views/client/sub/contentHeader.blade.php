<div class="d-flex justify-content-between gap-4 container-fluid col-11" style="margin-top: 195px;">
    <div class="col-2 d-flex flex-column align-items-center">
        <div class="text-center textSP fw-bold bg-light col-12">Sản phẩm nổi bật</div>
        <div class="cardLEFT col-12">
            @foreach ($header as $hd)
                <p class="card-titleLEFT">{{ $hd->title }}</p>
                <p class="small-desc">
                    {{ $hd->content }}
                </p>

                <img src="{{ $hd->image }}" alt="" class="col-12 sierra" data-bs-toggle="modal"
                    data-bs-target="#exampleModalImageSanPhamNoiBat">
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

        @foreach ($best_selling as $index => $bs)
            <div class="cardSP col-12">
                <div class="upper-part">
                    <div class="upper-part-face">
                        <img src="{{ $bs->image }}" width="100%" height="100%" alt="...">
                    </div>
                    <div class="upper-part-back pe-3 ps-3" style="font-size: 14px;">{{ $bs->mo_ta }}</div>
                </div>
                <div class="lower-part">
                    <div class="lower-part-face flex-column">
                        <div class="fs-6">{{ $bs->name_product }}</div>
                        <div class="text-danger">{{ $bs->product_price }}₫</div>
                    </div>
                    <div class="lower-part-back" style="position: relative;">
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
                        <span class="ms-2 d-flex flex-column">{{ $bs->sales }}
                            <a href="#" class="btn-xemThem" data-bs-toggle="modal"
                                data-bs-target="#exampleModalSanPhamBanChay{{ $index }}">Xem thêm</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Modal ảnh sản phẩm bán chạy nhất -->
            <div class="modal fade" id="exampleModalSanPhamBanChay{{ $index }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header container">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $bs->name_product }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body container d-flex">
                            <div class="aside col-4">
                                <img src="{{ $bs->image }}" alt="" class="col-12">
                                <div class="col-12 mt-3 pt-3 pb-3">
                                    <div class=" table-page col-lg-12">
                                        <div class="card" style="border: none;">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table-user table table-striped table-bordered table-hover"
                                                        id="example" style="width:100%">
                                                        <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                                                        <thead>
                                                            <th>Thông số kỹ thuật</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>hello anh em</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="article ps-4 col-8">
                                <div class="col-12 fw-bold fs-4">{{ $bs->name_product }}</div>
                                <div class="col-12">Sao đánh giá</div>
                                <div class="col-12 fs-2 text-danger mt-3 fw-bold">{{ $bs->product_price }}₫</div>
                                <div class="col-12 mt-3">
                                    <div class="text-danger fw-bold p-3"
                                        style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0">Quà tặng
                                        khuyến mãi
                                    </div>
                                    <div class="text-danger p-3"
                                        style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px">Tặng
                                        ngay em phương
                                        anh 2005
                                    </div>

                                </div>
                                <div class="mt-3" id="toltoptips">
                                    <div class="wrapper">
                                        <input type="checkbox" />
                                        <div class="btn"></div>
                                        <div class="tooltip"><svg></svg><span>Thượng kế muốn mua sản phẩm có thể tìm
                                                kiếm hoặc tìm ở các phần bên dưới ạ</span></div>
                                        <svg></svg>
                                    </div>

                                </div>
                                <div class="col-12 mt-3">
                                    <li>Bảo hành chính hãng 12 tháng</li>
                                    <li>Hỗ trợ đổi mới trong 7 ngày</li>
                                    <li>Miễn phí giao hàng toàn quốc</li>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="text-dark fw-bold p-3"
                                        style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">Ưu đãi đặc
                                        biệt
                                    </div>
                                    <div class="text-dark p-3"
                                        style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px">Được
                                        ôm phương anh
                                        nhóm quái xế 1 cái
                                    </div>

                                </div>

                                <div class="col-12 fs-5 fw-bold mt-4">Liên hệ</div>
                                <div class="col-12">
                                    <ul class="socials mt-3 m-0 p-0 d-flex">
                                        @foreach ($contact as $item)
                                            @if ($item->hinh_thuc == 'mail')
                                                <li><a target="_blank" href="{{ $item->link }}"><i class="fas fa-envelope"
                                                            aria-hidden="true"></i></a></li>
                                            @elseif ($item->hinh_thuc == 'zalo')
                                                <li><a target="_blank" href="{{ $item->link }}"><i class="fas fa-phone"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
