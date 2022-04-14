@extends('admin.layouts.master')
@section('content')
<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title"> Chỉnh sửa  </h1>
</header>

<div class="page-section">
    <div class="d-xl-none">
        <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
    </div>
    <div id="base-style" class="card">
        <div class="card-body">
            <form method="post" action="{{route('products.update',$product->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="form-group">
                        <label for="tf1">Tên lô đất</label> <input value="{{$product->name}}" name="name" type="text" class="form-control" id="" placeholder="nhập tên"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Địa chỉ</label> <input value="{{$product->address}}" name="address" type="text" class="form-control" id="" placeholder="nhập địa chỉ"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Giá tiền</label> <input value="{{$product->price}}" name="price" type="text" class="form-control" id="" placeholder="nhập giá tiền"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('price') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Chi tiết thông tin</label> <input value="{{$product->description}}" name="description" type="text" class="form-control" id="" placeholder="nhập chi tiết thông tin"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loại tên người sở hữu đất</label>
                        <select name="product_category_id" value="{{$product->product_category_id}}" class="form-control">
                            @foreach($productCategories as $productCategory)
                            <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('product_category_id') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Khu vực</label> <input value="{{$product->area}}" name="area" type="text" class="form-control" id="" placeholder="nhập khu vực"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('area') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Luật pháp</label> <input value="{{$product->juridical}}" name="juridical" type="text" class="form-control" id="" placeholder="nhập luật pháp lý"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('juridical') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Địa chỉ trên bản đồ</label> <input value="{{$product->google_map}}" name="google_map" type="text" class="form-control" id="" placeholder="nhập địa chỉ trên bản đồ"> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('google_map') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">chiều rộng ứng suất</label> <input value="{{$product->stress_width}}" name="stress_width" type="text" class="form-control" id="" placeholder="nhập chiều rộng ứng suất "> <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('stress_width') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên tĩnh thành</label>
                        <select name="province_id" value="{{$product->province_id}}" class="form-control">
                            @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{$province->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('province_id') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Quận Huyện</label>
                        <select name="district_id"  value="{{$product->district_id}}" class="form-control">
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('district_id') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Khu vực</label>
                        <select name="ward_id" value="{{$product->ward_id}}" class="form-control">
                            @foreach($wards as $ward)
                            <option value="{{$ward->id}}">{{$ward->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('ward_id')}}</p>
                        @endif
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