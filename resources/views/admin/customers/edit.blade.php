@extends('admin.layouts.master')
@section('content')
<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('customers.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Khách Hàng</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh Sửa Khách Hàng </h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('customers.update',$customer->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <!-- <form method="post" action="{{route('customers.update',$customer->id)}}">
                    @csrf
                    @method('PUT') -->
                <div class="form-group">
                    <label for="tf1">Tên khách hàng</label> <input type="text" name="name" value="{{ $customer->name }}" class="form-control" placeholder="Nhập tên kách hàng"> 
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tf1"> Địa chỉ </label> <input type="text" name="address" value="{{ $customer->address }}" class="form-control" placeholder="Nhập địa chỉ"> 
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Số điện thoại</label> <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" placeholder="Nhập số điện thoại"> 
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('customers.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection