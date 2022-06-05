@extends('admin.layouts.master')

@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('users.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Giấy Tờ Pháp Lý</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Nhập Nhân Viên</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('users.postImport')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>File import</legend>
                <div class="form-group">
                    <label for="tf1">Chọn File <abbr name="Trường bắt buộc">*</abbr></label> <input name="file" type="file" class="form-control" id="" placeholder="Nhập tên giấy tờ pháp lý">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('file') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Nhóm nhân viên</label>
                            <select class="form-select form-control" name="user_group_id">

                                @foreach($userGroups as $userGroup)
                                <option value="{{ $userGroup->id }}">{{ $userGroup->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_group_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Chi nhánh</label>
                            <select class="form-select form-control" name="branch_id">
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('branch_id') }}</p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('users.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Nhập</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
