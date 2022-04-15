@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('roles.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Danh Sách Vai Trò </a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh Sửa Vai Trò </h1>
</header>

<div class="page-section">
    <div class="d-xl-none">
        <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
    </div>
    <div id="base-style" class="card">
        <div class="card-body">
            <form method="post" action="{{route('roles.update',$role->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Base style</legend>
                    <div class="form-group">
                        <label for="tf1"> Vai trò </label> <input type="text" name="name" value="{{$role->name}}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                </fieldset>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit"> Cập nhật </button>
                    <a class="btn btn-secondary" href="{{route('roles.index')}}"> Hủy </a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection