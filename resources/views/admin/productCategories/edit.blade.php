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
    <h1 class="page-title"> Chỉnh sửa {{ $productCategory->name }} </h1>
</header>

<div class="page-section">
    <div class="d-xl-none">
        <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
    </div>
    <div id="base-style" class="card">
        <div class="card-body">
            <form method="post" action="{{route('productCategories.update',$productCategory->id)}}" >
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Base style</legend>
                    <div class="form-group">
                        <label for="tf1">Chỉ sủa tên</label> <input type="text" name="name" value="{{ $productCategory->name }}" class="form-control"  placeholder="Nhập tên nhóm nhân viên"> <small  class="form-text text-muted"></small>
                    </div>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
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