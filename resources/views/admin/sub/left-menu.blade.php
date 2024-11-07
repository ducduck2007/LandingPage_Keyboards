<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/images/logo.webp') }}" alt="logo" />
        <h2 class="mb-0">ĐƚԋɳιҽɳVHB</h2>
    </div>
    <ul class="sidebar-links ps-0">
        <h4>
            <span>Main Menu</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="{{ route('dealSale.index') }}">
                <span class="material-symbols-outlined"> dashboard </span>QL sản phẩm sale
            </a>
        </li>
        <h4>
            <span>Account</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="#"><span class="material-symbols-outlined"> settings </span>Settings</a>
        </li>
    </ul>

</aside>
<div class="overplay"></div>
<label class="rocker rocker-small me-5">
    <input type="checkbox" id="toggleSidebar" checked>
    <span class="switch-left">ON</span>
    <span class="switch-right">OFF</span>
</label>
<script>
    document.getElementById('toggleSidebar').addEventListener('change', function() {
        var sidebar = document.getElementById('sidebar');
        var nav = document.querySelector('nav'); // Truy cập vào phần tử nav
        var containerCustom = document.getElementById('container');
        if (this.checked) {
            sidebar.style.left = '0'; // Yes được chọn
            nav.style.width = ''; // Khôi phục width mặc định của nav
            containerCustom.style.width = '';
        } else {
            sidebar.style.left = '-85px'; // No được chọn
            nav.style.width = '100%'; // Nav sẽ có width 100%
            containerCustom.style.width = '100%';
        }
    });
</script>
