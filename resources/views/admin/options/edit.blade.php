@extends('admin.layouts.master')
@section('content')
<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('options.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Cấu Hình</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh Sửa Cấu Hình</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('options.update',$option->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <!-- <form method="post" action="{{route('options.update',$option->id)}}">
                    @csrf
                    @method('PUT') -->
                <div class="form-group">
                    <label for="tf1">Tên nhóm</label> <input type="text" name="option_group" value="{{ $option->option_group }}" class="form-control" placeholder="Nhập nhóm chọn">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_group') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Nhãn</label> <input type="text" name="option_label" value="{{ $option->option_label }}" class="form-control" placeholder="Nhập nhãn chọn">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_label') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Tên </label> <input type="text" name="option_name" value="{{ $option->option_name }}" class="form-control" placeholder="Nhập tên">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Giá trị</label> <input type="text" name="option_value" value="{{ $option->option_value }}" class="form-control" placeholder="Nhập giá trị">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('option_value') }}</p>
                    @endif
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('options.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection