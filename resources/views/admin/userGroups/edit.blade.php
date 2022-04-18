@extends('admin.layouts.master')
@section('content')
<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('userGroups.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Nhóm Nhân viên</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh sửa nhóm nhân viên </h1>
</header>

<div class="page-section">
    <div class="d-xl-none">
        <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
    </div>
    <div id="base-style" class="card">
        <div class="card-body">
            <form method="post" action="{{route('userGroups.update',$userGroup->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="form-group">
                        <label for="tf1">Tên nhóm nhân viên</label> <input type="text" name="name" value="{{ $userGroup->name }}" class="form-control" placeholder="nhập tên nhóm nhân viên"> <small class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Nhóm nhân viên </label> <input type="text" name="description" value="{{ $userGroup->description }} " class="form-control" placeholder="nhập địa chỉ"> <small class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </fieldset>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

                    </div>
                    <div class="col-lg-6">
                        <button style="float: right;" class="btn btn-primary" type="submit">Cập nhật<noscript></noscript> </button>

                    </div>
                </div>


            </form>

        </div>
    </div>
</div>
@endsection