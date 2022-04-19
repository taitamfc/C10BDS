@extends('admin.layouts.master')
@section('content')



<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('users.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Nhân Viên</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Sửa nhân viên<noscript></noscript> </h1>
</header>

<div class="page-section">


    <form method="post" action="{{route('users.update',$users->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>

                <div class="form-group">
                    <label for="tf1"> Email </label> <input name="email" type="email" class="form-control" id="" placeholder="Nhập email" value="{{ $users->email }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tf1">Mật khẩu</label> <input name="password" type="password" class="form-control" id="" placeholder="Nhập mật khẩu" value="{{ $users->password }}">

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
                                <option value="{{ $province->id }}">{{$province->name}}</option>
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
                                <option value="">Vui lòng chọn</option>
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
                                <option value="">Vui lòng chọn</option>
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
                    <div class="col-lg-9">

                        <label for="tf1">Tên nhân viên<noscript></noscript></label>
                        <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên nhân viên" value="{{ $users->name }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif

                    </div>
                    <div class="col-lg-3">

                        <label>Giới tính</label>
                        <input type="radio" name="gender" checked value="Nam">Nam
                        <input type="radio" name="gender" value="Nữ">Nữ

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('gender') }}</p>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Ngày sinh <noscript></noscript></label>
                    <input name="day_of_birth" type="date" class="form-control" id="" placeholder="Nhập ngày sinh " value="{{ $users->day_of_birth }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('day_of_birth') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tf1"> Địa chỉ </label> <input name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ" value="{{ $users->address }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tf1">Ngày làm việc</label> <input name="start_day" type="date" class="form-control" id="" placeholder="Nhập ngày làm việc" value="{{ $users->start_day }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('start_day') }}</p>
                    @endif
                </div>


                <div class="form-group">
                    <label for="tf1">Ghi chú</label> <input name="note" type="text" class="form-control" id="" placeholder="Nhập ghi chú" value="{{ $users->note }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('note') }}</p>
                    @endif
                </div>


            </div>
            <div class="card-body border-top">
                <legend>Thông tin liên hệ</legend>
                <div class="form-group">
                    <label for="tf1"> Số điện thoại </label> <input name="phone" type="text" class="form-control" id="" placeholder="Nhập số điện thoại" value="{{ $users->phone }}">

                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>



                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Nhóm nhân viên</label>
                            <select class="form-select form-control" name="user_group_id">

                                @foreach($userGroups as $userGroup)
                                <option value="{{ $userGroup->id }}">{{ $userGroup->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_group_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Chi nhánh</label>
                            <select class="form-select form-control" name="branch_id">
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('branch_id') }}</p>
                            @endif
                        </div>
                    </div>

                </div>

            </div>


            <div class="form-actions">
                <button class="btn btn-secondary float-right" onclick="window.history.go(-1); return false;">Hủy</button>
                <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
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