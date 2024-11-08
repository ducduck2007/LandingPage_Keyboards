
@extends('admin.sub.layout')
@section('css')
    <link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">  
@endsection
@section('content')
<div class="page-title-box">
    <div class="row align-items-center ">
        <div class="col-md-8">
            <div class="page-title-box">
                <h4 class="page-title">TÀI KHOẢN CMS</h4>
                @if($errors->any())
                <span style="color:red">{{$errors->first()}}</span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">           
              
                
                <div class="form-group mb-0">
                    <div>
                        @can('tk cms ds')
                        <button type="submit" name="create" class="btn btn-primary btn-lg waves-effect waves-light">
                            Danh sách
                        </button>
                        @endcan
                        @can('tk cms create')
                        <a href="{{route('cms-user.create')}}" name="create" class="btn btn-success btn-lg waves-effect waves-light">
                            Thêm mới
                        </a>
                        @endcan
                      
                    </div>
                  
                </div>
           
        </div>
    </div>
</div>
@isset($data)
    <div class=" table-page col-lg-12">
        <div class="card">
            <div class="card-body" >
                
                <p>DANH SÁCH USER --- TỔNG USER: <span style="color:red" class="count"></span></p>
                <div class="table-responsive">
                    <input type="hidden" id="token" value="{{csrf_token()}}">
                <table class="table-user table table-striped table-bordered table-hover" id="example" class="display" style="width:100%">
                    <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                    <thead>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Quyền hạn</th>
                        <th>Trạng thái</th>
                        @can('tk cms detail')
                            <th>Hành động</th>
                        @endcan
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td> 
                                <td>{{$d->UserID}}</td>
                                <td>{{$d->ho_ten}}</td>
                                <td>{{$d->phone}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->address}}</td>
                                <td>{{$d->roles()->pluck('name')->implode(',')}}</td>
                                <td>@if($d->status == 1) Hoạt động @else Không hoạt động @endif</td>
                                @can('tk cms detail')
                                <td>
                                    <a href="{{route('cms-user.edit',['id'=>$d->id])}}" class="btn btn-info btn-xs">Chi tiết</a>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
                   
                </div>
              
            </div>
        </div>
    </div>
   


</div>

@endisset


@endsection
@section('js')

<script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>

   <script>
       
       	$(document).ready(function() {
           
            $('#example').dataTable({
                    'order':[],
                    "scrollX": true,
                    "footerCallback": function ( row, data, start, end, display ) {
                    $('.count').text(this.api().page.info().recordsTotal);
            }  
        });
        });
      
   </script>

@endsection