@extends('admin.sub.layout')

@section('css')
<link href="{{asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center ">
        <div class="col-md-8">
            <div class="page-title-box">
                
                <h4 class="page-title">Thêm mới</h4>
       
                <!-- <p>Nhập các thông tin để thêm tài khoản CMS</p> -->
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
            <div class="card-body" style="padding-top: 0px;">           
              <form action="{{route('cms-user.postCreate')}}" method="post" >
              {{ csrf_field() }}
              
                <div class="row">
                   
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Họ Tên</label>
                            <input class="form-control" type="text" name="ho_ten" placeholder="Nhập họ và tên" value="{{ old('ho_ten') }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Tên đăng nhập</label>
                            <input class="form-control" type="text" autocomplete="new-UserID" name="UserID" placeholder="Tên đăng nhập từ 3 đến 32 ký tự" value="{{ old('UserID') }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Số điện thoại</label>
                            <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}"> 
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Nhập email" value="{{ old('email') }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Địa chỉ</label>
                            <input class="form-control" type="text"  name="address" placeholder="Nhập địa chỉ" value="{{ old('address') }}"> 
                            
                        </div>
                    </div>
                 
                    <div class="col-4 sub-text" style="display: block;" >
                        <div class="form-group">
                     
                            <label class="col-form-label">Quyền hạn</label>
                            <select class="form-control value_date" name="roles[]" multiple="multiple" required oninvalid="this.setCustomValidity('Vui lòng chọn quyền hạn!')">
                                @if (old('roles'))
                                    @foreach($roles as $val)
                                    <option value="{{ $val->id }}" {{ in_array($val->id, old('roles')) ? 'selected' : '' }}>{{$val->name}}</option>   
                                    @endforeach
                                    @else
                                    @foreach($roles as $val)
                                     <option value="{{ $val->id }}">{{$val->name}}</option>
                                @endforeach
                                @endif
                              
                            </select>
                        </div>
                    </div>
                         
                      
                 
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <label class="col-form-label" >Trạng thái</label>
                        <select class="form-control"  name="status" id="status">
                            <option value="1" @if(old('status')=='1') selected @endif>Hoạt động</option>
                            <option value="0" @if(old('status')=='0') selected @endif>Không hoạt động</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                 
                            <label style="font-weight: 600;" class="control-label">Mật khẩu:</label>
                            
                            <div class="input-group mb-2 ">
                              
                                <input class="form-control" id='pwd_login' autocomplete="new-password"  type="password" name="password" placeholder="Mật khẩu từ 8 đến 20 ký tự" value="">
                                <div class="input-group-prepend p-viewer">
                                <div class="input-group-text"> <i class="fa fa-eye-slash" id="togpass" view="off" aria-hidden="true"></i></div>
                                </div>
                            
                            </div>
                            
                            
                            
                        </div>
                               
                    </div>
                </div>
                
                
                <div class="form-group mb-0">
                    <div>
                        <a href="{{route('cms-user.index')}}" class="btn btn-secondary waves-effect waves-light" >
                            QUAY LẠI
                        </a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitSearch">
                            THÊM
                        </button>
                        
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('assets/plugins/select2-4.1.0/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
      
        $("body").on('click', '.p-viewer', function() {
            if($('#togpass').attr("view")=="off"){
                $('#togpass').removeClass("fa-eye-slash");
                $('#togpass').addClass("fa-eye");
                $('#togpass').attr("view","on")
            }else{
                $('#togpass').addClass("fa-eye-slash");
                $('#togpass').removeClass("fa-eye");
                $('#togpass').attr("view","off")
            }
            var input = $("#pwd_login");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        
        $('.value_date').select2({
            placeholder: 'Chọn quyền',
           
        });
    });

</script>
@endsection
