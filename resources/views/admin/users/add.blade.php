@extends('admin.layouts.master')
@section('content')



<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm nhân viên<noscript></noscript> </h1>
</header>

<div class="page-section">

  
            <form method="post" action="{{route('users.store')}}">
                @csrf
      
                <fieldset>

                    <div class="form-group">
                        <label for="tf1">Tên nhân viên<noscript></noscript></label> <input name="name" type="text" class="form-control" id="" placeholder="nhập tên nhân viên"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Ngày sinh <noscript></noscript></label> <input name="birthday" type="date" class="form-control" id="" placeholder="nhập ngày sinh "> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Địa chỉ </label> <input name="address" type="text" class="form-control" id="" placeholder="nhập địa chỉ"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Email </label> <input name="email" type="text" class="form-control" id="" placeholder="nhập email"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Mật khẩu</label> <input name="password" type="text" class="form-control" id="" placeholder="nhập mật khẩu"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Ngày làm việc</label> <input name="start_day" type="date" class="form-control" id="" placeholder="nhập ngày làm việc"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('start_day') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Nhóm nhân viên</label> <input name="users_group_id" type="text" class="form-control" id="" placeholder="nhập nhóm nhân viên"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('users_group_id') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Chi nhánh</label> <input name="branch_id" type="text" class="form-control" id="" placeholder="nhập chi nhánh"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('branch_id') }}</p>
                    @endif


                </fieldset>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Thêm nhân viên<noscript></noscript> </button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

                </div>
            </form>
        </div>


    </div>


</div>
@endsection                          