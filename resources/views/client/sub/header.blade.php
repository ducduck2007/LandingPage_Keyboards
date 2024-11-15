<header>
    <nav class="container container_nav d-flex align-items-center justify-content-between">
        <div class="left_nav d-flex align-items-center">
            <div class="logo d-flex align-items-center gap-2">
                <img src="assets/images/logo.png" alt="logo" height="60px" width="60px">
                <div class="namePage text-light fw-bold" style="font-family: unset !important;">Đƚԋɳιҽɳ <br> VHB
                </div>
            </div>
            <div class="ui-input-container ms-3">
                <input required="" placeholder="Tìm kiếm ở đây" class="ui-input" type="text" />
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
        </div>

        <ul class="menu_nav m-0 d-flex align-items-center gap-5">
            <li class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone-volume icon"></i>
                <a href="#" class="text-light textNav">Hotline <br>1900.1018</a>
            </li>

            <li class="d-flex align-items-center gap-2">
                <i class="fas fa-box-open icon"></i>
                <a href="#" class="text-light textNav">Lịch sử <br>đặt hàng</a>
            </li>

            <li class="d-flex align-items-center gap-2">
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
                    <a href="{{ route('client.login') }}" type="button" class="btn btn-danger">Đăng nhập</a>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('client.register') }}">Đăng ký</a></li>
                    </ul>
                @endif
            </div>

        </ul>
    </nav>
</header>
