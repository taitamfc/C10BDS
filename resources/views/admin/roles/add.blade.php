@extends('admin.layouts.master')
@section('content')


<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('roles.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trở về</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm vai trò </h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('roles.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên vai trò<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên vai trò">
                    <small class="form-text text-muted">Tối đa 30 ký tự</small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Tên nhóm người sử dụng<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="group_name" type="text" class="form-control" placeholder="Nhập tên nhóm">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('group_name') }}</p>
                    @endif
                </div>                
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('roles.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
    </form>
</div>

@endsection