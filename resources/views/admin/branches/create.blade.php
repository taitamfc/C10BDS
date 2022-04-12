@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('branches.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Chi Nhánh</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm chi nhánh </h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('branches.store')}}">
        @csrf

        <fieldset>

            <div class="form-group">
                <label for="tf1">Tên chi nhánh</label> <input name="name" type="text" class="form-control" id=""
                    placeholder="nhập tên chi nhánh"> <small id="" class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1"> Địa chỉ </label> <input name="address" type="text" class="form-control" id=""
                    placeholder="nhập địa chỉ"> <small id="" class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Số điện thoại</label> <input name="phone" type="text" class="form-control" id=""
                    placeholder="nhập số điện thoại"> <small id="" class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('phone') }}</p>
                @endif
            </div>


        </fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Thêm chi nhánh </button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

        </div>
    </form>
</div>


</div>


</div>
@endsection