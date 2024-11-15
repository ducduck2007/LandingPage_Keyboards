<!DOCTYPE html>
<html lang="en">

@include('admin.sub.header')

<body>
    <div class="accountbg"></div>



    <div class="wrapper-page">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="{{ route('admin.homeLogin') }}" class="logo logo-admin">
                                    <img src="{{ asset('assets/images/logo.png') }}" class="mt-3"
                                        style="margin-top: 0px!important;width:100%; max-width:200px;max-height: 140px;object-fit: cover;"></a>
                                <h4 class="page-title" style="margin-top: 0px!important;">CMS Quản lý <br>LANDING
                                    PAGE KEYBOARDS</h4>
                                @if ($errors->any())
                                    <p style="color:red">{{ $errors->first() }}</p>
                                @endif
                            </div>


                            <form class="form-horizontal mt-4" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="name">Têm đăng nhập</label>
                                        <input class="form-control" placeholder="User Name" name="name"
                                            type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password">Mật khẩu</label>
                                        <input class="form-control" placeholder="Password" name="password"
                                            type="password" value="">
                                    </div>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Đăng nhập</button>
                                    </div>
                                </div>



                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery  -->

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</body>

</html>
