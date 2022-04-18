@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('userGroups.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý nhóm</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm nhóm </h1>
</header>

<div class="page-section">
    <div class="card">
        <div class="card-body border-top">
            <form method="post" action="{{route('userGroups.store')}}">
                @csrf

                <fieldset>

                    <label for="tf1">Tên nhóm</label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên nhóm"> <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
        </div>
        <div class="card-body border-top">
            <label for="tf1"> Mô tả nhóm </label> <input name="description" type="text" class="form-control" id="" placeholder="Nhập mô tả nhóm"> <small id="" class="form-text text-muted"></small>
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
                <button style="float: right;" class="btn btn-primary" type="submit">Lưu<noscript></noscript> </button>

            </div>
        </div>

        </form>
        
    </div>
</div>
</div>
</div>
@endsection