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
