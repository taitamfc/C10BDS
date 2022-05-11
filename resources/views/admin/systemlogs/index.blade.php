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
    <a href="{{route('systemlogs.index')}}" class="btn btn-success btn-floated"></a>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"></h1>
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
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#modalFilterColumnssystemlogs">Tìm nâng cao</button>
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
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearchsystemlogs" type="button">Lưu bộ lọc</button>
                            </div>
                        </div>
                        <!-- modalFilterColumns  -->
                        @include('admin.systemlogs.modals.modalFilterColumnssystemlogs')
                    </form>
                    <!-- modalFilterColumns  -->
                    @include('admin.systemlogs.modals.modalSaveSearchsystemlogs')
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
                            <th> Hoạt động</th>
                            <th> Dữ liệu</th>
                            <th> Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($systemlogs as $systemlog)
                        <tr>
                            <td class="align-middle"> {{ $systemlog->id }} </td>
                            <td class="align-middle"> {{ $systemlog->type }} </td>
                            <td class="align-middle"> {{ $systemlog->data }} </td>
                            <td class="align-middle"> {{ $systemlog->created_at }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $systemlogs->links() }}</span>
                </ul>
            </div>
        </nav>
        @endsection