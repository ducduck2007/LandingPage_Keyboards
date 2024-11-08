@extends('admin.sub.layout')

@section('css')
<link href="{{asset('assets/plugins/select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="page-title-box">
    <div class="row align-items-center ">
        <div class="col-md-8">
            <div class="page-title-box">
                
                <h4>Chi tiết</h4>
       
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
            <form action="{{route('cms-user.postUpdate',['id'=>$model->id])}}" method="post">
              {{ csrf_field() }}
              
                <div class="row">
                   
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Họ Tên</label>
                            <input class="form-control" type="text" name="ho_ten" placeholder="Nhập họ và tên" value="{{ old('ho_ten',$model->ho_ten) }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Tên đăng nhập</label>
                            <input class="form-control" type="text"  name="UserID" placeholder="Tên đăng nhập từ 3 đến 32 ký tự" value="{{ old('UserID',$model->UserID) }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Số điện thoại</label>
                            <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone',$model->phone) }}"> 
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Nhập email" value="{{ old('email',$model->email) }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="col-form-label" >Địa chỉ</label>
                            <input class="form-control" type="text"  name="address" placeholder="Nhập địa chỉ" value="{{ old('address',$model->address) }}"> 
                            
                        </div>
                    </div>
                    <div class="col-4">
                       
                            <label for="" class="col-form-label">Quyền hạn</label>
                           
                            <select class="form-control value_date" name="roles[]" multiple="multiple" required>
                                @foreach($roles as $val)
                                    <option value="{{ $val->id }}"{{ in_array($val->id,old('roles',$model->roles()->pluck('id')->toArray())) ? 'selected' : '' }}>{{$val->name}}</option>
                                @endforeach
                           </select>
                            
                      
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <label class="col-form-label" >Trạng thái</label>
                        <select class="form-control"  name="status" id="status">
                            
                            <option value="1" @if(old('status',$model->status)=='1') selected @endif>Hoạt động</option>
                            <option value="0" @if(old('status',$model->status)=='0') selected @endif>Không hoạt động</option>
                        </select>
                    </div>
                  
                </div>
                <div style="height:25px"></div>
                
                <div class="form-group mb-0">
                    <div>
                        <a href="{{route('cms-user.index')}}" class="btn btn-secondary waves-effect waves-light" >
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
<script src="{{asset('assets/plugins/select2-4.1.0/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
      
     
        
        $('.value_date').select2({
            placeholder: 'Chọn quyền',
           
        });
    });

</script>
@endsection