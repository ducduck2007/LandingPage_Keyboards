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
                    <h4 class="page-title">LIÊN HỆ</h4>
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
                        {{-- <a href="{{ route('contact.create') }}" name="create"
                            class="btn btn-success waves-effect waves-light">
                            Thêm mới
                        </a> --}}
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
                                    <th>Hình thức</th>
                                    <th>Link</th>
                                    <th>Hành động</th>
                                </thead>

                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($d->hinh_thuc == 'zalo')
                                                    Zalo
                                                @elseif ($d->hinh_thuc == 'mail')
                                                    Mail
                                                @endif
                                            </td>
                                            <td>{{ $d->link }}</td>
                                            <td>
                                                <a style="background-color: #3498db; border-color:#3498db;color:whitesmoke;"
                                                    href="{{ route('contact.update', ['id' => $d->id]) }}"
                                                    class="btn waves-effect waves-light">SỬA</a>
                                                {{-- <a href="{{ route('contact.delete') }}" value="{{ $d->id }}"
                                                    class="btn btn-danger btn-md btn-dell">Xóa</a> --}}
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
                                url: '{{ route('contact.delete') }}',
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
