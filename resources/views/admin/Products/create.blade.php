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
                <label for="tf1">Tên lô đất</label> <input name="name" type="text" class="form-control" placeholder="Nhập tên"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Giá tiền</label> <input name="price" type="text" class="form-control" placeholder="Nhập giá tiền"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Chi tiết thông tin</label> <input name="description" type="text" class="form-control" placeholder="Nhập chi tiết thông tin"> <small class="form-text text-muted"></small>
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
                <label for="tf1">Khu vực</label> <input name="area" type="text" class="form-control" placeholder="Nhập khu vực"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('area') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Luật pháp</label> <input name="juridical" type="text" class="form-control" placeholder="Nhập luật pháp lý"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('juridical') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">Địa chỉ trên bản đồ</label> <input name="google_map" type="text" class="form-control" placeholder="Nhập địa chỉ trên bản đồ"> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('google_map') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tf1">chiều rộng ứng suất</label> <input name="stress_width" type="text" class="form-control" placeholder="Nhập chiều rộng ứng suất "> <small class="form-text text-muted"></small>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('stress_width') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tỉnh/Thành phố</label>
                        <select name="province_id" class="form-control province_id">
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
                        <label for="exampleInputEmail1">Quận/Huyện</label>
                        <select name="district_id" class="form-control district_id">
                            <option value="">Vui lòng chọn</option>
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('district_id') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Xã/Phường</label>
                        <select name="ward_id" class="form-control ward_id">
                            <option value="">Vui lòng chọn</option>
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

<script>
    jQuery( document ).ready( function(){
        jQuery('.province_id').on('change',function(){
            var province_id = jQuery(this).val();

            $.ajax({
				url		: "/api/get_districts/"+province_id,
				type	: "GET",
				success : function(data){
                    var districts_html = '<option value="">Vui lòng chọn</option>';
                    for (const district of data) {
                        districts_html += '<option value="'+ district.id +'">'+ district.name +'</option>';
                    }
                    jQuery('.district_id').html(districts_html);
                }
			});
            
        });

        jQuery('.district_id').on('change',function(){
            var district_id = jQuery(this).val();

            $.ajax({
				url		: "/api/get_wards/"+district_id,
				type	: "GET",
				success : function(data){
                    var wards_html = '<option value="">Vui lòng chọn</option>';
                    for (const ward of data) {
                        wards_html += '<option value="'+ ward.id +'">'+ ward.name +'</option>';
                    }
                    jQuery('.ward_id').html(wards_html);
                }
			});
            
        });
    });
</script>
@endsection