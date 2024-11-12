@extends('admin.sub.layout')
@section('css')
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <style>
        .checkbox-inline .toggle {
            margin-left: 0px !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-md-8">
                <div class="page-title-box">
                    <h4 class="page-title">TABLE SẢN PHẨM</h4>
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
                <div class="card-body" style="padding-bottom: 0px!important;padding-top: 0px!important;">
                    <div class="form-group mb-0">
                        <div><br></div>
                        <a href="{{ route('deal_sale.create') }}" name="create"
                            class="btn btn-success waves-effect waves-light">
                            Thêm mới
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class=" table-page col-lg-12">
            <div class="card">
                <div class="card-body">

                    @isset($data)
                        <p>Danh sách sản phẩm</p>
                        <div class="table-responsive">
                            <input type="hidden" id="token" value="{{ csrf_token() }}">

                            <table class="table-user table table-striped table-bordered table-hover" id="table-games"
                                class="display" style="width:100%">
                                <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                                <thead>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Vị trí phần</th>
                                    <th>Hành động</th>
                                </thead>

                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img style="width: 100px;"src={{ asset($d->image) }} alt=""></td>
                                            <td>{{ $d->title }}</td>
                                            <td>{!! $d->content !!}</td>
                                            <td>{{ $d->link }}₫</td>
                                            <td>
                                                @if ($d->vi_tri == 1)
                                                    Panel bàn phím cơ
                                                @elseif ($d->vi_tri == 2)
                                                    Panel bàn phím văn phòng
                                                @elseif ($d->vi_tri == 3)
                                                    Panel keycaps
                                                @elseif ($d->vi_tri == 4)
                                                    Bảng bàn phím cơ
                                                @elseif ($d->vi_tri == 5)
                                                    Bảng bàn phím văn phòng
                                                @elseif ($d->vi_tri == 6)
                                                    Bảng keycaps
                                                @elseif ($d->vi_tri == 7)
                                                    Bảng switch
                                                @endif
                                            </td>
                                            <td>
                                                <a style="background-color: #3498db; border-color:#3498db;color:whitesmoke;"
                                                    href="{{ route('deal_sale.update', ['id' => $d->id]) }}"
                                                    class="btn waves-effect waves-light">SỬA</a>
                                                <a href="{{ route('deal_sale.delete') }}" value="{{ $d->id }}"
                                                    class="btn btn-danger btn-md btn-dell">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endisset
                    </div>

                </div>
            </div>
        </div>
        <input type="hidden" id="ajaxToken" value="{{ csrf_token() }}">


    </div>




@endsection
@section('js')
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootbox/bootbox.min.js') }}"></script>
    <script>
        // $(document).ready(function() {

        //     $('#table-games').dataTable({
        //         'order': [],
        //         "scrollX": true,
        //         "footerCallback": function(row, data, start, end, display) {
        //             $('.count').text(this.api().page.info().recordsTotal);
        //         }
        //     });
        // });
    </script>
    <script>
        $(document).ready(function() {
            $('#table-games').dataTable({
                'order': [],
                "scrollX": true,
                "footerCallback": function(row, data, start, end, display) {
                    $('.count').text(this.api().page.info().recordsTotal);
                }
            });

            $(document).on('click', '.btn-dell', function(e) {
                var id = $(this).attr('value');
                e.preventDefault();
                bootbox.confirm({
                    message: "Bạn có chắc chắn muốn xoá?",
                    buttons: {
                        confirm: {
                            label: 'Có',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Không',
                            className: 'btn-secondary'
                        }
                    },
                    callback: function(result) {
                        if (result == true) {
                            $.ajax({
                                type: 'post',
                                url: '{{ route('deal_sale.delete') }}',
                                data: {
                                    id: id,
                                    _token: $('#ajaxToken').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if (data.message == 'success') {
                                        alert('Xóa thành công');
                                        location.reload();
                                    } else {
                                        alert('Xóa thất bại');
                                    }
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
