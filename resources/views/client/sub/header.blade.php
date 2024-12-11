<header>
    <nav class="container container_nav d-flex align-items-center justify-content-between">
        <div class="left_nav d-flex align-items-center">
            <div class="logo d-flex align-items-center gap-2">
                <img src="assets/images/logo.png" alt="logo" height="60px" width="60px">
                <div class="namePage text-light fw-bold" style="font-family: unset !important;">Đƚԋɳιҽɳ <br> VHB
                </div>
            </div>
            <!-- Dropdown chọn sản phẩm -->
            <div class="ui-input-container ms-3">
                <select class="ui-input select2" id="user_id" required>
                    <option value="">Chọn sản phẩm tìm kiếm</option>
                    @foreach ($products as $sp)
                        <option data-name="{{ $sp->name_product }}" data-description="{{ $sp->parameter }}"
                            data-price="{{ $sp->price }}" data-promotion="{{ $sp->promotion }}"
                            value="{{ $sp->id }}">
                            {{ $sp->name_product }}
                        </option>
                    @endforeach
                </select>
                <div class="ui-input-underline"></div>
                <div class="ui-input-highlight"></div>
                <div class="ui-input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor"
                            d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z">
                        </path>
                    </svg>
                </div>
            </div>

            {{-- <button type="button" class="btnSearch" data-bs-toggle="modal" data-bs-target="#exampleModalSearchNav">Tìm
                kiếm</button> --}}
        </div>

        <ul class="menu_nav m-0 d-flex align-items-center gap-5">
            <li class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone-volume icon"></i>
                @foreach ($contact as $item)
                    @if ($item->hinh_thuc == 'zalo')
                        <a href="{{ $item->link }}" class="text-light textNav">Zalo <br>0987263546</a>
                    @endif
                @endforeach
            </li>

            <li class="d-flex align-items-center gap-2" onclick="reloadAndOpenModal()">
                <i class="fas fa-box-open icon"></i>
                <span class="text-light textNav">Lịch sử <br>đặt hàng</span>
            </li>

            <li class="d-flex align-items-center gap-2 position-relative" onclick="openModal()">
                <i class="fa-solid fa-cart-shopping icon"></i>
                <span class="text-light textNav">Giỏ <br>hàng</span>
                <div class="sl_donHang text-dark fw-bold position-absolute bg-warning rounded-circle d-flex align-items-center justify-content-center"
                    style="width: 25px; height: 25px; right: -22%; top: -5%;">
                    0
                </div>
            </li>

            <div class="btn-group" id="btnAuth">
                @if (Auth::check())
                    <div class="menu">
                        <div class="item">
                            <a href="#" class="link">
                                <span>{{ Auth::user()->name }}</span>
                                <svg viewBox="0 0 360 360" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="XMLID_225_"
                                            d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <div class="submenu">
                                <div class="submenu-item">

                                    <form id="logoutForm" action="{{ route('client.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" class="submenu-link"
                                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Đăng
                                        xuất</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </ul>
    </nav>
</header>

<!-- Modal thông tin giỏ hàng -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Thông tin giỏ hàng</h5>
            </div>
            <div class="modal-body">
                <form id="cartForm" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="cartForm" class="btn btn-primary">Xác nhận hoặc thay đổi thông
                    tin</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#user_id').select2();

        $('#productSelect').on('change', function() {
            const selectedOption = $(this).find(':selected');
            const name = selectedOption.data('name');
            const description = selectedOption.data('description');

            // Gán dữ liệu vào modal
            $('#productName').text(`Tên sản phẩm: ${name}`);
            $('#productDescription').text(`Mô tả: ${description}`);

            // Hiển thị modal
            $('#exampleModalSearch').modal('show');
        });
    });

    function openModal() {
        // Mở modal đầu tiên
        var myModal = new bootstrap.Modal(document.getElementById('cartModal'));
        myModal.show();
    }

    function validateForm() {
        // Lấy các giá trị trong form
        var fullName = document.getElementById('fullName').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var email = document.getElementById('email').value;

        // Kiểm tra nếu các trường bị bỏ trống
        if (!fullName || !phone || !address || !email) {
            alert('Vui lòng điền đầy đủ thông tin!');
            return false;
        }

        // Nếu form hợp lệ, mở modal thứ hai
        var cartModal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
        cartModal.hide();

        var nextModal = new bootstrap.Modal(document.getElementById('exampleModalGioHang'));
        nextModal.show();

        return false;
    }

    function reloadAndOpenModal() {
        // Lưu trạng thái mở modal vào sessionStorage
        sessionStorage.setItem('openModal', 'true');

        // Reload trang
        location.reload();
    }

    window.onload = function() {
        // Kiểm tra nếu trạng thái modal là 'true'
        if (sessionStorage.getItem('openModal') === 'true') {
            // Mở modal sau khi trang tải lại
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalTraCuuDonHang'));
            myModal.show();

            // Xóa trạng thái sau khi đã mở modal
            sessionStorage.removeItem('openModal');
        }
    };
</script>
<style>
    .select2-selection__arrow {
        display: none;
    }

    .select2-container--default .select2-selection--single {
        background: none !important;
        padding: 22px 0;
    }

    .ui-input-icon svg {
        margin-bottom: 0;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 38px;
        padding-top: 0;
        margin-top: -12px;
        color: #fff;
    }

    .btnSearch {
        outline: none;
        background: none;
        border-radius: 4px;
        color: #fff;
        padding: 10px 35px;
        border: 2px solid #ccc;
        margin-left: 1rem;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btnSearch:hover {
        background: #fff;
        border: 2px solid #fff;
        color: #000;
    }
</style>
<script>
    function updateCartCount() {
        $.ajax({
            url: '{{ route('cart.count') }}',
            method: 'GET',
            success: function(response) {
                $('.sl_donHang').text(response.count);
            },
            error: function() {
                console.error('Không thể tải số lượng giỏ hàng.');
            }
        });
    }

    // Gọi hàm cập nhật mỗi 5 giây hoặc tùy chỉnh theo nhu cầu.
    setInterval(updateCartCount, 5000);

    // Gọi ngay khi trang load
    updateCartCount();
</script>
