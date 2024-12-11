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

            <li onclick="showAlertNotLogin()" class="d-flex align-items-center gap-2">
                <i class="fas fa-box-open icon"></i>
                <a href="#" class="text-light textNav">Lịch sử <br>đặt hàng</a>
            </li>

            <li onclick="showAlertNotLogin()" class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-cart-shopping icon"></i>
                <a href="#" class="text-light textNav">Giỏ <br>hàng</a>
            </li>

            <div class="btn-group">
                @if (Auth::check() && Auth::user()->role == 'user')
                    <!-- Kiểm tra nếu người dùng đã đăng nhập và có role là 'user' -->
                    <button type="button" class="btn btn-danger">{{ Auth::user()->name }}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <!-- Dropdown menu với button đăng xuất -->
                    <ul class="dropdown-menu">
                        <!-- Sử dụng form POST để đăng xuất -->
                        <form action="{{ route('client.logout') }}" method="POST">
                            @csrf <!-- Thêm token CSRF để bảo vệ form -->
                            <li><button type="submit" class="dropdown-item">Đăng xuất</button></li>
                        </form>
                    </ul>
                @else
                    <div id="buttons-auth">
                        <button type="button" class="btn">
                            <strong>LOGIN/REGISTER</strong>
                            <div id="container-stars">
                                <div id="stars"></div>
                            </div>

                            <div id="glow">
                                <div class="circle"></div>
                                <div class="circle"></div>
                            </div>
                        </button>
                    </div>

                    <div id="fromLoginRegister" class="d-flex flex-column">
                        <a href="{{ route('client.login') }}">Login</a>
                        <a href="{{ route('client.register') }}">Register</a>
                    </div>
                @endif
            </div>

        </ul>
    </nav>
</header>

<script>
    $(document).ready(function() {
        $('#user_id').select2();

        $('#productSelect').on('change', function() {
            const selectedOption = $(this).find(':selected');
            const name = selectedOption.data('name');
            const description = selectedOption.data('description');

            $('#productName').text(`Tên sản phẩm: ${name}`);
            $('#productDescription').text(`Mô tả: ${description}`);

            $('#exampleModalSearch').modal('show');
        });
    });

    const buttonAuth = document.getElementById('buttons-auth');
    const fromLoginRegister = document.getElementById('fromLoginRegister');
    let isOpen = false;

    buttonAuth.addEventListener('click', () => {
        if (isOpen) {
            fromLoginRegister.style.right = '';
        } else {
            fromLoginRegister.style.right = '10%';
        }
        isOpen = !isOpen;
    });
</script>
