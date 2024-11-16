@php
    $routeName = \Request::route()->getName();

@endphp
<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu" id="side-menu">
        <li class="menu-title @if ($routeName == 'admin.home') mm-active @endif">ADMIN</li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-power"></i><span>HEADER<span
                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="submenu ">

                <li @if ($routeName == 'header.index' || $routeName == 'header.update' || $routeName == 'header.create') class='mm-active' @endif><a href="{{ route('header.index') }}"
                        class="waves-effect"><span>Thông tin sản phẩm</span></a></li>
                <li @if ($routeName == 'image_header.index' || $routeName == 'image_header.update' || $routeName == 'image_header.create') class='mm-active' @endif><a
                        href="{{ route('image_header.index') }}" class="waves-effect"><span>Ảnh Carousel</span></a></li>
                <li @if ($routeName == 'bestSelling.index' || $routeName == 'bestSelling.update' || $routeName == 'bestSelling.create') class='mm-active' @endif><a
                        href="{{ route('bestSelling.index') }}" class="waves-effect"><span>Sản phẩm bán chạy</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-power"></i><span>DEAL SALE<span
                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="submenu ">


                <li @if (
                    $routeName == 'featured_photo.index' ||
                        $routeName == 'featured_photo.update' ||
                        $routeName == 'featured_photo.create') class='mm-active' @endif><a
                        href="{{ route('featured_photo.index') }}" class="waves-effect"><span>Ảnh nổi bật</span></a>
                </li>
            </ul>
        </li>

        <li class="menu-title @if ($routeName == 'admin.home') mm-active @endif">CHUNG</li>
        <li @if ($routeName == 'deal_sale.index' || $routeName == 'deal_sale.update' || $routeName == 'deal_sale.create') class='mm-active' @endif><a href="{{ route('deal_sale.index') }}"
                class="waves-effect"><span>QL card sản phẩm</span></a>
        </li>
        <li @if ($routeName == 'products.index' || $routeName == 'products.update' || $routeName == 'products.create') class='mm-active' @endif><a href="{{ route('products.index') }}"
                class="waves-effect"><span>Tổng sản phẩm</span></a>
        </li>
        <li @if ($routeName == 'contact.index' || $routeName == 'contact.update' || $routeName == 'contact.create') class='mm-active' @endif><a href="{{ route('contact.index') }}"
                class="waves-effect"><span>Liên hệ</span></a>
        </li>

        <li class="menu-title">NGƯỜI DÙNG</li>
        <li><a href="{{ route('client.home2') }}" class="waves-effect"><i
                    class="dripicons-power"></i><span>Thoát</span></a>
        </li>

    </ul>

</div>
<!-- Sidebar -->
