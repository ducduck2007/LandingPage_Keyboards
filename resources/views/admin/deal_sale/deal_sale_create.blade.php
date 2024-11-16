@extends('admin.sub.layout')

@section('css')
    <link href="{{ asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">

                    <h4>Tạo thông tin sản phẩm mới</h4>

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
                    <form action="{{ route('deal_sale.postCreate') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div><br></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" name="name_product"
                                        placeholder="Nhập tiêu đề" value="{{ old('name_product') }}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Giá sản phẩm</label>
                                    <input class="form-control" type="text" name="price"
                                        placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Vị trí phần</label>
                                    <select class="form-control" name="vi_tri" required>
                                        <option value="1" {{ old('vi_tri') == 1 ? 'selected' : '' }}>DEAL SALE - Bàn
                                            phím cơ
                                        </option>
                                        <option value="2" {{ old('vi_tri') == 2 ? 'selected' : '' }}>DEAL SALE - Bàn
                                            phím văn phòng
                                        </option>
                                        <option value="3" {{ old('vi_tri') == 3 ? 'selected' : '' }}>DEAL SALE -
                                            Keycaps
                                        </option>
                                        <option value="4" {{ old('vi_tri') == 4 ? 'selected' : '' }}>Các loại phím cơ
                                        </option>
                                        <option value="5" {{ old('vi_tri') == 5 ? 'selected' : '' }}>Các loại phím văn
                                            phòng
                                        </option>
                                        <option value="6" {{ old('vi_tri') == 6 ? 'selected' : '' }}>Các loại keycaps
                                        </option>
                                        <option value="7" {{ old('vi_tri') == 7 ? 'selected' : '' }}>Các loại switch
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả ngắn</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" placeholder="Nhập nội dung (quy định không quá 250 ký tự)" rows="3"
                                    cols="10">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Thông số kỹ thuật</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="parameter-editor" name="parameter" required placeholder="Nhập thông số kỹ thuật"
                                    rows="3" cols="10">{!! old('parameter') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Khuyến mãi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="promotion-editor" name="promotion" required placeholder="Nhập khuyến mãi"
                                    rows="3" cols="10">{!! old('promotion') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả bảo hành</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mo_ta-editor" name="mo_ta" required placeholder="Nhập khuyến mãi" rows="3"
                                    cols="10">{!! old('mo_ta') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ưu đãi đặc biệt</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="endow-editor" name="endow" required placeholder="Nhập khuyến mãi" rows="3"
                                    cols="10">{!! old('endow') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="image" class="col-sm-2 col-form-label">Ảnh:</label>

                            <div class="col-sm-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image"
                                        accept="image/png, image/jpg, image/gif, image/jpeg" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="image">Chọn ảnh...</label>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <a href="#" class="d-block mt-2">
                                    <img src="#" id="example_Image" class="img-thumbnail" width="150"
                                        alt="Preview Image">
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Đánh giá</label>
                                    <select class="form-control" name="evaluate" required>
                                        <option value="0.5" {{ old('evaluate') == 0.5 ? 'selected' : '' }}>
                                            0.5 sao
                                        </option>
                                        <option value="1" {{ old('evaluate') == 1 ? 'selected' : '' }}>
                                            1 sao
                                        </option>
                                        <option value="1.5" {{ old('evaluate') == 1.5 ? 'selected' : '' }}>
                                            1.5 sao
                                        </option>
                                        <option value="2" {{ old('evaluate') == 2 ? 'selected' : '' }}>
                                            2 sao
                                        </option>
                                        <option value="2.5" {{ old('evaluate') == 2.5 ? 'selected' : '' }}>
                                            2.5 sao
                                        </option>
                                        <option value="3" {{ old('evaluate') == 3 ? 'selected' : '' }}>
                                            3 sao
                                        </option>
                                        <option value="3.5" {{ old('evaluate') == 3.5 ? 'selected' : '' }}>
                                            3.5 sao
                                        </option>
                                        <option value="4" {{ old('evaluate') == 4 ? 'selected' : '' }}>
                                            4 sao
                                        </option>
                                        <option value="4.5" {{ old('evaluate') == 4.5 ? 'selected' : '' }}>
                                            4.5 sao
                                        </option>
                                        <option value="5" {{ old('evaluate') == 5 ? 'selected' : '' }}>
                                            5 sao
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div style="height:25px"></div>

                        <div class="form-group mb-0">
                            <div>
                                <a href="{{ route('deal_sale.index') }}"
                                    class="btn btn-secondary waves-effect waves-light">
                                    QUAY LẠI
                                </a>
                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                    id="submitSearch">
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
        <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('parameter-editor', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('promotion-editor', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('mo_ta-editor', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('endow-editor', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.config.height = 200;
        </script>
    @endsection
