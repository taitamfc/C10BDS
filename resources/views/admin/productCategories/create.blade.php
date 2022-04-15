@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('productCategories.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trở Lại</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm Tên</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('productCategories.store')}}">
        @csrf
        <fieldset>
            <div class="form-group">
                <label for="tf1">Tên</label> <input name="name" type="text" class="form-control" id=""
                    placeholder="Nhập tên danh mục sản phẩm "> <small id="" class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
        </fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Thêm danh mục </button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </div>
    </form>
</div>
</div>
</div>
@endsection