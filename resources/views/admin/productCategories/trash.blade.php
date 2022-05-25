@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <a href="{{route('productCategories.index')}}" class="btn btn-success btn-floated"></a>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Quản Lý Loại Sản Phẩm - Thùng Rác</h1>
        <div class="btn-toolbar">
            <a href="{{route('productCategories.create')}}" class="btn btn-primary">
                <i class="fa-solid fa fa-plus"></i>
                <span class="ml-1">Thêm Mới</span>
            </a>
        </div>
    </div>
</header>

<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('productCategories.index')}}">Tất Cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="{{route('productCategories.trash')}}">Thùng Rác</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#modalFilterColumnsproductCategories">Tìm nâng cao</button>
                            </div>
                            <div class="input-group has-clearable">
                                <button type="button" class="close trigger-submit trigger-submit-delay" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                </button>
                                <div class="input-group-prepend trigger-submit">
                                    <span class="input-group-text"><span class="fas fa-search"></span></span>
                                </div>
                                <input type="text" class="form-control" name="s" value="" placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearchproductCategories" type="button">Lưu bộ lọc</button>
                            </div>
                        </div>
                        <!-- modalFilterColumns  -->
                        @include('admin.productCategories.modals.modalFilterColumnsproductCategories')
                    </form>
                    <!-- modalFilterColumns  -->
                    @include('admin.productCategories.modals.modalSaveSearchproductCategories')
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <br>
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{session::get('success')}}</div>
                        @endif
                        <br>
                        <tr>
                            <th> # </th>
                            <th> Tên</th>
                            <th> Chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productCategories as $productCategory)
                        <tr>
                            <td class="align-middle"> {{ $productCategory->id }} </td>
                            <td class="align-middle"> {{ $productCategory->name }} </td>
                            <td>
                                @if(Auth::user()->hasPermission('ProductCategory_forceDelete'))
                                <form action="{{ route('productCategories.force_destroy',$productCategory->id )}}" style="display:inline" method="post">
                                    <button onclick="return confirm('Xóa vĩnh viễn {{$productCategory->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                                @endif

                                @if(Auth::user()->hasPermission('ProductCategory_restore'))
                                <span class="sr-only">Edit</span></a> <a href="{{route('productCategories.restore',$productCategory->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-trash-restore"></i> <span class="sr-only">Remove</span></a>
                                @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<nav aria-label="Page navigation example">
    <div class='float:right'>
        <ul class="pagination">
            <span aria-hidden="true"> {{ $productCategories->links() }}</span>
        </ul>
    </div>
</nav>
@endsection