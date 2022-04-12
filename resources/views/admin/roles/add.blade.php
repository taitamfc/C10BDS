@extends('admin.layouts.master')
@section('content')



<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm vai trò </h1>
</header>

<div class="page-section">

  
            <form method="post" action="{{route('roles.store')}}">
                @csrf
      
                <fieldset>

                    <div class="form-group">
                        <label for="tf1">Tên vai trò</label> <input name="name" type="text" class="form-control" id="" placeholder="nhập tên vai trò"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                    </div>


                </fieldset>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Thêm vai trò </button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

                </div>
            </form>
        </div>


    </div>


</div>
@endsection