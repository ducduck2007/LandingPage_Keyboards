@extends('admin.sub.layout')

@section('css')
    <link href="{{ asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">

                    <h4>Sửa thông tin sản phẩm bán chạy</h4>

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
                    <form action="{{ route('bestSelling.postUpdate', ['id' => $model->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" name="name_product" required
                                        placeholder="Nhập tên sản phẩm"
                                        value="{{ old('name_product', $model->name_product) }}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Giá sản phẩm</label>
                                    <input class="form-control" type="text" name="product_price" required
                                        placeholder="Nhập giá sản phẩm"
                                        value="{{ old('product_price', $model->product_price) }}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Lượt bán</label>
                                    <input class="form-control" type="text" name="sales" required
                                        placeholder="Nhập lượt bán" value="{{ old('sales', $model->sales) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="mo_ta" placeholder="Mô tả" rows="3" cols="10">{{ old('mo_ta', $model->mo_ta) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 control-label">Ảnh Image
                                {{-- <span style="color: red">(800x450)</span>: --}}
                            </label>
                            <div class="col-sm-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image"
                                        accept="image/png, image/jpg, image/gif, image/jpeg" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="image">Chọn ảnh Image</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <a href="{{ asset($model->image) }}">
                                    <img src="{{ asset($model->image) }}" id="example_Image" width="150"
                                        alt="Preview Image">
                                </a>
                            </div>
                        </div>

                        <div style="height:25px"></div>

                        <div class="form-group mb-0">
                            <div>
                                <a style="background-color: #34495e; border-color:#34495e;color:whitesmoke;"
                                    href="{{ route('bestSelling.index') }}" class="btn waves-effect waves-light">
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
