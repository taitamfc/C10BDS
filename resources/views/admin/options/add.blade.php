@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('options.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Nhóm</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm nhóm chọn</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('options.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên <abbr name="Trường bắt buộc">*</abbr></label> <input name="option_name" type="text" class="form-control" id="" placeholder="Nhập tên ">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Tên nhóm<abbr name="Trường bắt buộc">*</abbr></label> <input name="option_group" type="text" class="form-control" id="" placeholder="Nhập địa chỉ">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_group') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Giá trị<abbr name="Trường bắt buộc">*</abbr></label> <input name="option_value" type="text" class="form-control" id="" placeholder="Nhập địa chỉ">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_value') }}</p>
                    @endif                                                                                                                                                                                                                                                                                                                                                  
                </div>
                <div class="form-group">
                    <label for="tf1">Tên nhãn<abbr name="Trường bắt buộc">*</abbr></label> <input name="option_label" type="text" class="form-control" id="" placeholder="Nhập địa chỉ">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_label') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-actions">
                <a class="btn btn-secondary float-right" href="{{route('options.index')}}">Hủy</a>
                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
            </div>
        </div>

    </form>
</div>


@endsection