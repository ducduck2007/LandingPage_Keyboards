@extends('admin.sub.layout')

@section('css')
    <link href="{{ asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">

                    <h4>Cài đặt thời gian sale</h4>

                    <!-- <p>Nhập các thông tin để thêm tài khoản CMS</p> -->
                    @if ($errors->any())
                        <span style="color:red">{{ $errors->first() }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="padding-top: 0px;">
                    <form action="{{ route('time_sale.postCreate') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div><br></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Cài đặt thời gian</label>
                                    <input class="form-control" type="datetime-local" name="time"
                                        placeholder="Chọn ngày giờ" value="{{ old('time') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <a href="{{ route('time_sale.index') }}" class="btn btn-secondary waves-effect waves-light">
                                    QUAY LẠI
                                </a>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitSearch">
                                    CẬP NHẬT
                                </button>

                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    @endsection
    @section('js')
        <script>
            $(document).ready(function() {
                $('#image').change(function(event) {
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    $('#example_Image').attr('src', tmppath);
                });
            })
        </script>
    @endsection
