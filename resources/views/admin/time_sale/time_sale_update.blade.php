@extends('admin.sub.layout')

@section('css')
    <link href="{{ asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">

                    <h4>Sửa thông tin sản phẩm</h4>

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
                    <form action="{{ route('time_sale.postUpdate', ['id' => $model->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Cài đặt thời gian</label>
                                    <input class="form-control" type="datetime-local" name="time" required
                                        placeholder="Chọn ngày giờ" value="{{ old('time', $model->time) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <a style="background-color: #34495e; border-color:#34495e;color:whitesmoke;"
                                    href="{{ route('time_sale.index') }}" class="btn waves-effect waves-light">
                                    QUAY LẠI
                                </a>
                                <button style="background-color: #9b59b6; border-color:#9b59b6;color:whitesmoke;"
                                    type="submit" class="btn waves-effect waves-light" id="submitSearch">
                                    CẬP NHẬT
                                </button>

                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2-4.1.0/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#image').change(function(event) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $('#example_Image').attr('src', tmppath);
            });
        })
    </script>
@endsection
