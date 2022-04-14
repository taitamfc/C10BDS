@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('products.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trở Lại</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Thêm Tên</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('products.store')}}">
        @csrf
        <fieldset>
            <div class="form-group">
                <label for="tf1">Tên lô đất</label> <input name="name" type="text" class="form-control" placeholder="nhập tên"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form-control" placeholder="nhập địa chỉ"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Giá tiền</label> <input name="price" type="text" class="form-control" placeholder="nhập giá tiền"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Chi tiết thông tin</label> <input name="description" type="text" class="form-control" placeholder="nhập chi tiết thông tin"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Loại tên người sở hữu đất</label>
                <select name="product_category_id" class="form-control">
                    @foreach($productCategories as $productCategory)
                    <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                    @endforeach
                </select>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('product_category_id') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Khu vực</label> <input name="area" type="text" class="form-control" placeholder="nhập khu vực"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('area') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Luật pháp</label> <input name="juridical" type="text" class="form-control" placeholder="nhập luật pháp lý"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('juridical') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Địa chỉ trên bản đồ</label> <input name="google_map" type="text" class="form-control" placeholder="nhập địa chỉ trên bản đồ"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('google_map') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">chiều rộng ứng suất</label> <input name="stress_width" type="text" class="form-control" placeholder="nhập chiều rộng ứng suất "> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('stress_width') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên tỉnh thành</label>
                        <select name="province_id" class="form-control">
                            @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{$province->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('province_id') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Quận Huyện</label>
                        <select name="district_id" class="form-control">
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('district_id') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Khu vực</label>
                        <select name="ward_id" class="form-control">
                            @foreach($wards as $ward)
                            <option value="{{$ward->id}}">{{$ward->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('ward_id')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Thêm danh mục </button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </div>
    </form>
</div>
</div>
</div>
@endsection