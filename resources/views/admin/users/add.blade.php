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
    <h1 class="page-title"> Thêm nhân viên<noscript></noscript> </h1>
</header>

<div class="page-section">

    <div class="card">
        <div class="card-body border-top">
            <form method="post" action="{{route('users.store')}}">
                @csrf

                <fieldset>
                    <div class="row">
                        <div class="col-lg-7">

                            <div class="form-group">
                                <label for="tf1">Tên nhân viên<noscript></noscript></label>
                                <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên nhân viên" value="{{ old('name') }}">

                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="tf1">Ngày sinh <noscript></noscript></label>
                                <input name="day_of_birth" type="date" class="form-control" id="" placeholder="Nhập ngày sinh " value="{{ old('day_of_birth') }}">

                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('day_of_birth') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="tf1"> Địa chỉ </label> <input name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ" value="{{ old('address') }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Email </label> <input name="email" type="email" class="form-control" id="" placeholder="Nhập email" value="{{ old('email') }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Số điện thoại </label> <input name="phone" type="text" class="form-control" id="" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Mật khẩu</label> <input name="password" type="password" class="form-control" id="" placeholder="Nhập mật khẩu" value="{{ old('password') }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Ngày làm việc</label> <input name="start_day" type="date" class="form-control" id="" placeholder="Nhập ngày làm việc" value="{{ old('start_day') }}">

                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('start_day') }}</p>
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


                        <div class="col-12">
                            <label for="tf1">Ghi chú</label> <input name="note" type="text" class="form-control" id="" placeholder="Nhập ghi chú" value="{{ old('note') }}">

                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('note') }}</p>
                            @endif


                </fieldset>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                    <div class="col-lg-6">
                        <button style="float: right;" class="btn btn-primary" type="submit">Lưu<noscript></noscript> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection