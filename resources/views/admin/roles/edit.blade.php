@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('roles.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Vai Trò</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Chỉnh Sửa Vai Trò</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('roles.update',$role->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <!-- <form method="post" action="{{route('roles.update',$role->id)}}">
                    @csrf
                    @method('PUT') -->
                <div class="form-group">
                    <label for="tf1"> Vai trò </label> <input type="text" name="name" value="{{$role->name}}" class="form-control">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1"> Nhóm người dùng </label> <input type="text" name="group_name" value="{{$role->group_name}}" class="form-control">
                    <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{$errors->first('group_name')}}</p>
                    @endif
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('roles.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection