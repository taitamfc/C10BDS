@extends('admin.layouts.master')
@section('content')



<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('users.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Nhân
                    Viên</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh Sửa Nhân Viên<noscript></noscript> </h1>
</header>

<div class="page-section">



    <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>

                <div class="form-group">
                    <label> Số điện thoại </label> <input name="phone" type="phone" class="form-control" id="" placeholder="Nhập số điện thoại" value="{{ $user->phone }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label> <input name="password" type="password" class="form-control" id="" placeholder="Nhập mật khẩu" value="">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh/Thành phố</label>
                            <select name="province_id" class="form-control province_id">
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}" @selected($province->id == $user->province_id)>{{$province->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('province_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quận/Huyện</label>
                            <select name="district_id" class="form-control district_id">
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" @selected($district->id == $user->district_id)>{{$district->name}}</option>
                                @endforeach;
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('district_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xã/Phường</label>
                            <select name="ward_id" class="form-control ward_id">
                                @foreach($wards as $ward)
                                <option value="{{ $ward->id }}" @selected($ward->id == $user->ward_id)>{{$ward->name}}</option>
                                @endforeach;
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('ward_id')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Thông tin cá nhân</legend>

                <div class="row">


                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Hình ảnh nhân viên</label>
                            <input type="file" name="avatar" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Tên nhân viên<noscript></noscript></label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên nhân viên" value="{{ $user->name }}">

                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="d-block">Giới tính</label>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="gender" id="rd1" checked="" value="male">
                                <label class="custom-control-label" for="rd1">Nam</label>
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="gender" id="rd2" value="female">
                                <label class="custom-control-label" for="rd2">Nữ</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Ngày sinh <noscript></noscript></label>
                            <input name="day_of_birth" type="date" class="form-control" id="" placeholder="Nhập ngày sinh " value="{{ $user->day_of_birth }}">

                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('day_of_birth') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="col-lg-4">
                        @if( $user->avatar )
                        <img src="/{{ $user->avatar}}" width="260px" alt="">
                        @else
                        <img src="https://us.123rf.com/450wm/urfandadashov/urfandadashov1806/urfandadashov180601827/150417827-photo-not-available-vector-icon-isolated-on-transparent-background-photo-not-available-logo-concept.jpg?ver=6" width="220px" alt="">
                        @endif
                    </div>            

                </div>

                <div class="form-group">
                    <label> Địa chỉ </label> <input name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ" value="{{ $user->address }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Ngày làm việc</label> <input name="start_day" type="date" class="form-control" id="" placeholder="Nhập ngày làm việc" value="{{ $user->start_day }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('start_day') }}</p>
                    @endif
                </div>


                <div class="form-group">
                    <label>Ghi chú</label> <input name="note" type="text" class="form-control" id="" placeholder="Nhập ghi chú" value="{{ $user->note }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('note') }}</p>
                    @endif
                </div>


            </div>
            <div class="card-body border-top">
                <legend>Thông tin liên hệ</legend>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nhóm nhân viên</label>
                            <select class="form-select form-control" name="user_group_id">

                                @foreach($userGroups as $userGroup)
                                <option value="{{ $userGroup->id }}" @selected($userGroup->id == $user->user_group_id)>
                                    {{ $userGroup->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_group_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Chi nhánh</label>
                            <select class="form-select form-control" name="branch_id">
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" @selected($branch->id == $user->branch_id)>
                                    {{ $branch->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('branch_id') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-actions">
                    <button class="btn btn-secondary float-right" onclick="window.history.go(-1); return false;">Hủy</button>
                    <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                </div>
            </div>



        </div>
    </form>



</div>

<script>
    jQuery(document).ready(function() {
        jQuery('.province_id').on('change', function() {
            var province_id = jQuery(this).val();

            $.ajax({
                url: "/api/get_districts/" + province_id,
                type: "GET",
                success: function(data) {
                    var districts_html = '<option value="">Vui lòng chọn</option>';
                    for (const district of data) {
                        districts_html += '<option value="' + district.id + '">' +
                            district.name + '</option>';
                    }
                    jQuery('.district_id').html(districts_html);
                }
            });

        });

        jQuery('.district_id').on('change', function() {
            var district_id = jQuery(this).val();

            $.ajax({
                url: "/api/get_wards/" + district_id,
                type: "GET",
                success: function(data) {
                    var wards_html = '<option value="">Vui lòng chọn</option>';
                    for (const ward of data) {
                        wards_html += '<option value="' + ward.id + '">' + ward.name +
                            '</option>';
                    }
                    jQuery('.ward_id').html(wards_html);
                }
            });

        });
    });
</script>
@endsection