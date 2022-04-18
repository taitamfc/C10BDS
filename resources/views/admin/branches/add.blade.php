@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('branches.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trở lại</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm chi nhánh</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('branches.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên chi nhánh</label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên chi nhánh">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Số điện thoại</label> <input name="phone" type="text" class="form-control" id="" placeholder="Nhập số điện thoại">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('branches.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection