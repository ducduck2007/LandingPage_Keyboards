@php
    $routeName = \Request::route()->getName();

@endphp
<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu" id="side-menu">
        <li class="menu-title @if ($routeName == 'admin.home') mm-active @endif">ADMIN</li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-power"></i><span>QL Header<span
                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="submenu ">

                <li @if ($routeName == 'header.index' || $routeName == 'header.update' || $routeName == 'header.create') class='mm-active' @endif><a href="{{ route('header.index') }}"
                        class="waves-effect"><span>Thông tin sản phẩm</span></a></li>
            </ul>
        </li>
        {{-- <li @if ($routeName == 'link_copy.index' || $routeName == 'link_copy.update' || $routeName == 'link_copy.create') class='mm-active' @endif><a href="{{ route('link_copy.index') }}"
                class="waves-effect"><i class="dripicons-power"></i><span>QL Link MXH</span></a></li> --}}




        <li class="menu-title">NGƯỜI DÙNG</li>
        <li @if ($routeName == 'view-change-pass') class='mm-active' @endif><a href="{{ route('view-change-pass') }}"
                class="waves-effect"><i class="dripicons-power"></i><span>Đổi mật khẩu</span></a></li>
        <li><a href="{{ route('Logout') }}" class="waves-effect"><i class="dripicons-power"></i><span>Logout</span></a>
        </li>

    </ul>

</div>
<!-- Sidebar -->
