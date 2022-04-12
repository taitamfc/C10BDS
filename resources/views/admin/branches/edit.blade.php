@extends('admin.layouts.master')
@section('content')
<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh sửa chi nhánh </h1>
</header>

<div class="page-section">
    <div class="d-xl-none">
        <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
    </div>
    <div id="base-style" class="card">
        <div class="card-body">
            <form method="post" action="{{route('branches.update',$branch->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Base style</legend>
                    <div class="form-group">
                        <label for="tf1">Tên chi nhánh</label> <input type="text" name="name" value="{{ $branch->name }}" class="form-control" placeholder="nhập tên chi nhánh"> <small class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1"> Địa chỉ </label> <input type="text" name="address" value="{{ $branch->address }} " class="form-control" placeholder="nhập địa chỉ"> <small class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Số điện thoại</label> <input type="text" name="phone" value=" {{ $branch->phone }} " class="form-control" placeholder="nhập số điện thoại"> <small class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                    </div>




                </fieldset>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

                </div>
            </form>
        </div>


    </div>


</div>
@endsection