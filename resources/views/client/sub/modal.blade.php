<style>
    .socials li {
        list-style: none;
    }

    .socials li a {
        position: relative;
        width: 60px;
        height: 60px;
        display: block;
        text-align: center;
        margin: 0 10px;
        border-radius: 50%;
        padding: 6px;
        box-sizing: border-box;
        text-decoration: none;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
        background: linear-gradient(0deg, #ddd, #fff);
        transition: .5s;
    }

    .socials li a:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        text-decoration: none;
    }

    .socials li a .fas {
        width: 100%;
        height: 100%;
        display: block;
        background: linear-gradient(0deg, #fff, #ddd);
        border-radius: 50%;
        line-height: calc(60px - 12px);
        font-size: 24px;
        color: #262626;
        transition: .5s;
    }

    .socials li:nth-child(1) a:hover .fas {
        color: #3b5998;
    }

    .socials li:nth-child(2) a:hover .fas {
        color: #00aced;
    }

    .gioHang {
        border: 1px solid #262626;
        padding: 2rem 0 0 3rem;
        background: rgba(238, 238, 238, 0.5);
    }
</style>

<!-- Modal ảnh sản phẩm nổi bật -->
<div class="modal fade" id="exampleModalImageSanPhamNoiBat" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header container">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $header[0]->title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container d-flex">
                <div class="aside col-4">
                    <img src="{{ $header[0]->image }}" alt="" class="col-12">
                    <div class="col-12 mt-3 pt-3 pb-3">
                        <div class=" table-page col-lg-12">
                            <div class="card" style="border: none;">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table-user table table-striped table-bordered table-hover"
                                            id="example" class="display" style="width:100%">
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
                    <div class="col-12 fw-bold fs-4">{{ $header[0]->title }}</div>
                    <div class="col-12">Sao đánh giá</div>
                    <div class="col-12 fs-2 text-danger mt-3 fw-bold">32.990.000₫</div>
                    <div class="col-12 mt-3">
                        <div class="text-danger fw-bold p-3"
                            style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0">Quà tặng khuyến mãi
                        </div>
                        <div class="text-danger p-3"
                            style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px">Tặng ngay em phương
                            anh 2005
                        </div>

                    </div>
                    <button type="button" class="btn btn-danger mt-3 p-5 pt-2 pb-2 fs-4">MUA NGAY</button>
                    <div class="col-12 mt-3">
                        <li>Bảo hành chính hãng 12 tháng</li>
                        <li>Hỗ trợ đổi mới trong 7 ngày</li>
                        <li>Miễn phí giao hàng toàn quốc</li>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="text-dark fw-bold p-3"
                            style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">Ưu đãi đặc biệt
                        </div>
                        <div class="text-dark p-3"
                            style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px">Được ôm phương anh
                            nhóm quái xế 1 cái
                        </div>

                    </div>

                    <div class="col-12 fs-5 fw-bold mt-4">Liên hệ</div>
                    <div class="col-12">
                        <ul class="socials mt-3 m-0 p-0 d-flex">
                            @foreach ($contact as $item)
                                @if ($item->hinh_thuc == 'mail')
                                    <li><a href="{{ $item->link }}"><i class="fas fa-envelope"
                                                aria-hidden="true"></i></a></li>
                                @elseif ($item->hinh_thuc == 'zalo')
                                    <li><a href="{{ $item->link }}"><i class="fas fa-phone"
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

<!-- Modal tìm kiếm sản phẩm -->
@foreach ($products as $sp)
    <div class="modal fade" id="modalSearchProduct{{ $sp->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header container">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $sp->name_product }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container d-flex">
                    <div class="aside col-4">
                        <img id="product_image{{ $sp->id }}" src="{{ $sp->image }}" alt="Product Image"
                            class="col-12">
                        <div class="col-12 mt-3 pt-3 pb-3">
                            <div class=" table-page col-lg-12">
                                <div class="card" style="border: none;">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table-user table table-striped table-bordered table-hover"
                                                id="example" class="display" style="width:100%">
                                                <thead>
                                                    <th>Thông số kỹ thuật</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="product_description{{ $sp->id }}">
                                                            {!! $sp->parameter !!}</td>
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
                        <div class="col-12 fw-bold fs-4">{{ $sp->name_product }}</div>
                        <div class="col-12" id="product_rating{{ $sp->id }}"
                            style="margin: 4px 0 0 8px;font-size: 18px;color: #f0f073;">
                            <span class="fw-bold">{{ $sp->evaluate }}</span>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($sp->evaluate >= $i)
                                    <i class="fa-solid fa-star"></i> <!-- Full star -->
                                @elseif ($sp->evaluate >= $i - 0.5)
                                    <i class="fa-solid fa-star-half-stroke"></i> <!-- Half star -->
                                @else
                                    <i class="fa-regular fa-star"></i> <!-- Empty star -->
                                @endif
                            @endfor
                        </div>
                        <div class="col-12 fs-2 text-danger mt-3 fw-bold" id="product_price{{ $sp->id }}">
                            {{ $sp->price }}</div>
                        <div class="col-12 mt-3">
                            <div class="text-danger fw-bold p-3"
                                style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0"
                                id="product_promotion_header{{ $sp->id }}">Quà tặng khuyến mãi</div>
                            <div class="text-danger p-3"
                                style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px"
                                id="product_promotion{{ $sp->id }}">{!! $sp->promotion !!}</div>
                        </div>
                        <button type="button" id="notLogin" class="btn btn-danger mt-3 p-5 pt-2 pb-2 fs-4">MUA
                            NGAY</button>
                        <div class="col-12 mt-3">
                            {!! $sp->mo_ta !!}
                        </div>

                        <div class="col-12 mt-4">
                            <div class="text-dark fw-bold p-3"
                                style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">Ưu đãi đặc biệt
                            </div>
                            <div class="text-dark p-3"
                                style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px">
                                {!! $sp->endow !!}</div>
                        </div>

                        <div class="col-12 fs-5 fw-bold mt-4">Liên hệ</div>
                        <div class="col-12">
                            <ul class="socials mt-3 m-0 p-0 d-flex">
                                @foreach ($contact as $item)
                                    @if ($item->hinh_thuc == 'mail')
                                        <li><a href="{{ $item->link }}"><i class="fas fa-envelope"
                                                    aria-hidden="true"></i></a></li>
                                    @elseif ($item->hinh_thuc == 'zalo')
                                        <li><a href="{{ $item->link }}"><i class="fas fa-phone"
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

<script>
    // Khi chọn sản phẩm từ dropdown, cập nhật modal với thông tin tương ứng
    $('#user_id').on('change', function() {
        var productId = $(this).val();
        var selectedOption = $(this).find('option:selected');

        // Kiểm tra xem sản phẩm đã chọn có đúng thông tin hay không
        if (productId) {
            var productName = selectedOption.data('name');
            var productDescription = selectedOption.data('description');
            var productPrice = selectedOption.data('price');
            var productPromotion = selectedOption.data('promotion');
            var productImage = selectedOption.data('image'); // Thêm vào để cập nhật ảnh sản phẩm

            // Cập nhật các thông tin trong modal
            $('#product_description' + productId).html(
                productDescription); // Sử dụng .html() để hỗ trợ thẻ HTML
            $('#product_price' + productId).text(productPrice);
            $('#product_promotion' + productId).html(productPromotion);
            $('#product_image' + productId).attr('src', productImage); // Đảm bảo có thuộc tính image

            // Mở modal với ID tương ứng
            $('#modalSearchProduct' + productId).modal('show');
        } else {
            console.log("Sản phẩm không tồn tại hoặc ID không hợp lệ.");
        }
    });
</script>

<!-- Modal giỏ hàng -->
<div class="modal fade" id="exampleModalGioHang" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header container">
                <a href="{{ route('client.home') }}" class="modal-title fs-5 d-flex align-items-center gap-2"
                    id="exampleModalLabel" style="text-decoration: none">
                    <i class="fa-solid fa-angles-left"></i>
                    <span>Mua thêm sản phẩm khác</span>
                </a>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body container d-flex justify-content-start align-items-center flex-column">
                <i class="fa-solid fa-bag-shopping"
                    style="position: absolute;right: 15px;font-size: 32px;rotate: 15deg;"></i>
                <div class="col-9 d-flex align-items-start mt-2 gap-4 gioHang">
                    <div class="aside col-2">
                        <img src="{{ $header[0]->image }}" alt="" class="col-12">
                    </div>
                    <div class="article ps-4 col-10 position-relative">
                        <div class="col-12 fw-bold fs-5">{{ $header[0]->title }}</div>
                        <div class="col-12 fs-6">Mô tả</div>
                        <div class="col-12 fs-6 text-danger mt-1 fw-bold">32.990.000₫</div>
                        {{-- <button type="button" class="btn btn-success mt-2 p-2 ps-3 pe-3 fs-6">THANH TOÁN</button> --}}

                        <div class="containerTT mt-2">
                            <div class="left-side">
                                <div class="cardTT">
                                    <div class="card-line"></div>
                                    <div class="buttons"></div>
                                </div>
                                <div class="post">
                                    <div class="post-line"></div>
                                    <div class="screen">
                                        <div class="dollar">$</div>
                                    </div>
                                    <div class="numbers"></div>
                                    <div class="numbers-line2"></div>
                                </div>
                            </div>
                            <div class="right-side">
                                <div class="new">Thanh toán</div>

                                <svg viewBox="0 0 451.846 451.847" height="512" width="512"
                                    xmlns="http://www.w3.org/2000/svg" class="arrow">
                                    <path fill="#cfcfcf" data-old_color="#000000" class="active-path"
                                        data-original="#000000"
                                        d="M345.441 248.292L151.154 442.573c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744L278.318 225.92 106.409 54.017c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.287 194.284c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373z">
                                    </path>
                                </svg>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .containerTT {
        background-color: #ffffff;
        display: flex;
        width: 460px;
        height: 120px;
        position: relative;
        border-radius: 6px;
        transition: 0.3s ease-in-out;
        scale: 0.6;
    }

    .containerTT:hover {
        transform: scale(1.03);
        width: 220px;
    }

    .containerTT:hover .left-side {
        width: 100%;
    }

    .left-side {
        background-color: #5de2a3;
        width: 130px;
        height: 120px;
        border-radius: 4px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.3s;
        flex-shrink: 0;
        overflow: hidden;
    }

    .right-side {
        width: calc(100% - 130px);
        display: flex;
        align-items: center;
        overflow: hidden;
        cursor: pointer;
        justify-content: space-between;
        white-space: nowrap;
        transition: 0.3s;
    }

    .right-side:hover {
        background-color: #f9f7f9;
    }

    .arrow {
        width: 20px;
        height: 20px;
        margin-right: 20px;
    }

    .new {
        font-size: 23px;
        font-family: "Lexend Deca", sans-serif;
        margin-left: 20px;
    }

    .cardTT {
        width: 70px;
        height: 46px;
        background-color: #c7ffbc;
        border-radius: 6px;
        position: absolute;
        display: flex;
        z-index: 10;
        flex-direction: column;
        align-items: center;
        -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
        -moz-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
        -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
    }

    .card-line {
        width: 65px;
        height: 13px;
        background-color: #80ea69;
        border-radius: 2px;
        margin-top: 7px;
    }

    @media only screen and (max-width: 480px) {
        .containerTT {
            transform: scale(0.7);
        }

        .containerTT:hover {
            transform: scale(0.74);
        }

        .new {
            font-size: 18px;
        }
    }

    .buttons {
        width: 8px;
        height: 8px;
        background-color: #379e1f;
        box-shadow: 0 -10px 0 0 #26850e, 0 10px 0 0 #56be3e;
        border-radius: 50%;
        margin-top: 5px;
        transform: rotate(90deg);
        margin: 10px 0 0 -30px;
    }

    .containerTT:hover .cardTT {
        animation: slide-top 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) both;
    }

    .containerTT:hover .post {
        animation: slide-post 1s cubic-bezier(0.165, 0.84, 0.44, 1) both;
    }

    @keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        50% {
            -webkit-transform: translateY(-70px) rotate(90deg);
            transform: translateY(-70px) rotate(90deg);
        }

        60% {
            -webkit-transform: translateY(-70px) rotate(90deg);
            transform: translateY(-70px) rotate(90deg);
        }

        100% {
            -webkit-transform: translateY(-8px) rotate(90deg);
            transform: translateY(-8px) rotate(90deg);
        }
    }

    .post {
        width: 63px;
        height: 75px;
        background-color: #dddde0;
        position: absolute;
        z-index: 11;
        bottom: 10px;
        top: 120px;
        border-radius: 6px;
        overflow: hidden;
    }

    .post-line {
        width: 47px;
        height: 9px;
        background-color: #545354;
        position: absolute;
        border-radius: 0px 0px 3px 3px;
        right: 8px;
        top: 8px;
    }

    .post-line:before {
        content: "";
        position: absolute;
        width: 47px;
        height: 9px;
        background-color: #757375;
        top: -8px;
    }

    .screen {
        width: 47px;
        height: 23px;
        background-color: #ffffff;
        position: absolute;
        top: 22px;
        right: 8px;
        border-radius: 3px;
    }

    .numbers {
        width: 12px;
        height: 12px;
        background-color: #838183;
        box-shadow: 0 -18px 0 0 #838183, 0 18px 0 0 #838183;
        border-radius: 2px;
        position: absolute;
        transform: rotate(90deg);
        left: 25px;
        top: 52px;
    }

    .numbers-line2 {
        width: 12px;
        height: 12px;
        background-color: #aaa9ab;
        box-shadow: 0 -18px 0 0 #aaa9ab, 0 18px 0 0 #aaa9ab;
        border-radius: 2px;
        position: absolute;
        transform: rotate(90deg);
        left: 25px;
        top: 68px;
    }

    @keyframes slide-post {
        50% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        100% {
            -webkit-transform: translateY(-70px);
            transform: translateY(-70px);
        }
    }

    .dollar {
        position: absolute;
        font-size: 16px;
        font-family: "Lexend Deca", sans-serif;
        width: 100%;
        left: 0;
        top: 0;
        color: #4b953b;
        text-align: center;
    }

    .containerTT:hover .dollar {
        animation: fade-in-fwd 0.3s 1s backwards;
    }

    @keyframes fade-in-fwd {
        0% {
            opacity: 0;
            transform: translateY(-5px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
