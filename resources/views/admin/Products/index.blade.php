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
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Danh sách tất cả</h1>
        <div class="btn-toolbar">
            <a href="{{route('products.create')}}" class="btn btn-primary">
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
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group input-group-alt">
                    <div class="input-group-prepend">
                        <select class="custom-select">
                            <option selected> Filter By </option>
                            <option value="1"> Tags </option>
                            <option value="2"> Vendor </option>
                            <option value="3"> Variants </option>
                            <option value="4"> Prices </option>
                            <option value="5"> Sales </option>
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                        </div><input type="text" class="form-control" placeholder="Search record">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <br>
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{session::get('success')}}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{session::get('error')}}</div>
                        @endif
                        <br>
                        <tr>
                            <th> # </th>
                            <th>Địa chỉ</th>
                            <th>Giá tiền</th>
                            <th>Chi tiết thông tin</th>
                            <th>Địa chỉ trên bản đồ</th>
                            <th>Tên Quận Huyện</th>
                            <th> chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="align-middle"> {{ $product->id }} </td>
                            <td class="align-middle"> {{ $product->address }} </td>
                            <td class="align-middle"> {{ $product->price }} </td>
                            <td class="align-middle"> {{ $product->description }} </td>
                            <td class="align-middle"> {{ $product->google_map }} </td>
                            <td class="align-middle"> {{ $product->province_id }} </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" title="Edit Student"><button class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> </button></a>
                                <form method="POST" action="{{ route('products.destroy',$product->id )}}" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Xóa {{$product->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $products->links() }}</span>
                </ul>
            </div>
        </nav>
        @endsection