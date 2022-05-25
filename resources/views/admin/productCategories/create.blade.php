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
        <div class="card">
            <div class="card-body">
                <fieldset>
                    <div class="form-group">
                        <label for="tf1">Tên</label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên danh mục sản phẩm " value="{{ old('name') }}"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </fieldset>
                <div class="form-actions">
                <a class="btn btn-secondary float-right" href="{{route('productCategories.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Thêm danh mục </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection