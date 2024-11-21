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

                        <button type="button" class="btn btn-danger mt-3 p-5 pt-2 pb-2 fs-4 buy-now"
                            data-name="{{ $sp->name_product }}" data-image="{{ $sp->image }}"
                            data-price="{{ $sp->price }}">
                            MUA NGAY
                        </button>

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
                <a href="" class="modal-title fs-5 d-flex align-items-center gap-2" data-bs-dismiss="modal"
                    aria-label="Close" id="exampleModalLabel" style="text-decoration: none">
                    <i class="fa-solid fa-angles-left"></i>
                    <span>Mua thêm sản phẩm khác</span>
                </a>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body container d-flex justify-content-start align-items-center flex-column">
                <i class="fa-solid fa-bag-shopping"
                    style="position: absolute;right: 15px;font-size: 32px;rotate: 15deg;"></i>

                {{-- <div class="col-9 d-flex align-items-start mt-2 gap-4 gioHang">
                    <div class="aside col-2">
                        <img src="{{ $header[0]->image }}" alt="" class="col-12">
                    </div>
                    <div class="article ps-4 col-10 position-relative">
                        <div class="col-12 fw-bold fs-5">{{ $header[0]->title }}</div>
                        <div class="col-12 fs-6">Mô tả</div>
                        <div class="col-12 fs-6 text-danger mt-1 fw-bold">32.990.000₫</div>

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
                </div> --}}

                <div class="container-fluid col-11 mt-4">
                    <div class=" table-page col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p>GIỎ HÀNG</p>
                                <div class="table-responsive">
                                    <table class="table-user table table-striped table-bordered table-hover"
                                        id="example" class="display" style="width:100%">
                                        <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                                        <thead>
                                            <th style="text-align: center">STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th style="text-align: center">Ảnh sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody id="giohang-table">

                                        </tbody>
                                    </table>
                                    {{-- <div class="containerTT">
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
                                                <path fill="#cfcfcf" class="active-path"
                                                    d="M345.441 248.292L151.154 442.573c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744L278.318 225.92 106.409 54.017c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.287 194.284c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.buy-now').forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const image = this.getAttribute('data-image');
            const price = this.getAttribute('data-price');

            console.log('Tên:', name, 'Hình ảnh:', image, 'Giá:', price);

            $.ajax({
                type: 'POST',
                url: "{{ route('cart.add') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    image: image,
                    price: price
                },
                success: function(response) {
                    console.log("done");
                },
                error: function(error) {
                    console.log("that bai");
                }
            });
            alert("Đã thêm vào giỏ hàng thành công!");
            alert("Giỏ hàng sẽ cập nhật sau 10 giây");
        });
    });
</script>
<script>
    // Hàm để load lại giỏ hàng
    function loadCart() {
        $.ajax({
            url: "{{ route('update.cart') }}", // Đường dẫn tới route AJAX
            method: "GET",
            success: function(response) {
                if (response.length === 0) {
                    return; // Nếu không có giỏ hàng, không làm gì
                }

                let giohangContent = '';

                response.forEach(function(item) {
                    giohangContent += `
                        <tr>
                            <td style="text-align: center">${item.quantity}</td> <!-- Số lượng ban đầu -->
                            <td>${item.name_product}</td> <!-- Tên sản phẩm -->
                            <td style="text-align: center"><img width="100px" src="${item.image}" alt=""></td> <!-- Hình ảnh sản phẩm -->
                            <td>${item.price}</td>
                            <td>
                                <div class="quantity-container">
                                    <input type="number" class="quantity-input" value="${item.quantity}" min="1">
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success btnThanhToan" 
                                        data-id="{{ $item->id }}" 
                                        data-name_product="{{ $item->name_product }}" 
                                        data-image="{{ $item->image }}" 
                                        data-price="{{ $item->price }}">
                                    Thanh toán
                                </button>
                            </td>
                        </tr>
                    `;
                });

                $('#giohang-table').html(giohangContent);

                $(document).on('click', '.btnThanhToan', function() {
                    const $row = $(this).closest('tr'); // Lấy dòng hiện tại
                    const id = $(this).data('id'); // Lấy id từ data-id
                    const name = $(this).data('name_product'); // Lấy name_product
                    const image = $(this).data('image'); // Lấy image
                    const price = $(this).data('price'); // Lấy price
                    const quantity = $row.find('.quantity-input').val(); // Lấy số lượng mới từ input

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('checkout') }}", // Đường dẫn route
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id, // Gửi thêm id
                            name: name,
                            image: image,
                            price: price,
                            quantity: quantity
                        },
                        success: function(response) {
                            console.log("done");
                            alert("Đã thêm vào giỏ hàng thành công!");
                        },
                        error: function(error) {
                            console.log("that bai");
                            alert("Có lỗi xảy ra!");
                        }
                    });
                });
            }
        });
    }

    setInterval(loadCart, 10000);
    loadCart();
</script>
