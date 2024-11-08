@extends('admin.sub.layout')
@section('css')
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">
                    <h4 class="page-title">ĐỔI MẬT KHẨU</h4>
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
                <div class="card-body">

                    <form action="{{ route('update-pass') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nhập mật khẩu cũ</label>
                                    <input class="form-control" name="passOld" type="password" id="passOld"
                                        placeholder="Nhập mật khẩu cũ" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nhập mật khẩu mới</label>
                                    <input class="form-control" name="passNew" type="password" id="passNew"
                                        placeholder="Nhập mật khẩu mới" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nhập lại mật khẩu mới</label>
                                    <input class="form-control" name="repassNew" type="password" id="repassNew"
                                        placeholder="Nhập lại mật khẩu mới" value="">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitSearch">
                                    UPDATE
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
