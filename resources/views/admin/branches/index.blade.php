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
        <h1 class="page-title mr-sm-auto"> Danh sách chi nhánh</h1><!-- .btn-toolbar -->
        <div class="btn-toolbar">
            <a href="{{ route('branches.create') }}" class="btn btn-primary">
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
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">Tất Cả</a>
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
            @if (Session::has('success'))
                <div class="alert alert-success">{{session::get('success')}}</div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Tên chi nhánh </th>
                            <th> Địa chỉ </th>
                            <th> Số điện thoại </th>
                            <th> chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                        <tr>

                            <td class="align-middle"> {{ $branch->id }} </td>
                            <td class="align-middle"> {{ $branch->name }} </td>
                            <td class="align-middle"> {{ $branch->address }} </td>
                            <td class="align-middle"> {{ $branch->phone }} </td>
                            <td>
                                <form action="{{ route('branches.destroy',$branch->id )}}" style="display:inline" method="post">

                                    <button onclick="return confirm('Xóa {{$branch->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <span class="sr-only">Edit</span></a> <a href="{{route('branches.edit',$branch->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                            </td>
                            <!-- <a href="{{ route('branches.destroy',$branch->id )}}" > -->

                        </tr><!-- /tr -->
                        @endforeach
                    </tbody><!-- /tbody -->
                </table><!-- /.table -->
                <br>
                <div class="container">

                    {{ $branches->links() }}


                </div>
                <br>
                <br>

            </div>
            <!-- /.table-responsive -->
            <!-- .pagination -->

        </div><!-- /.card-body -->




        @endsection