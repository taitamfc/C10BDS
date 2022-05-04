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
    <h1 class="page-title">Thêm Sản Phẩm</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="exampleInputEmail1">Loại bất động sản</label>
                    <select name="product_category_id" class="form-control" value="{{ old('product_category_id') }}">
                        @foreach($productCategories as $productCategory)
                        <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('product_category_id') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh/Thành phố</label>
                            <select name="province_id" class="form-control province_id" value="{{ old('province_id') }}">
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
                            <select name="district_id" class="form-control district_id" value="{{ old('district_id') }}">
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
                            <select name="ward_id" class="form-control ward_id" value="{{ old('ward_id') }}">
                                <option value="">Vui lòng chọn</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('ward_id')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form-control" placeholder="Bạn có thể bổ sung hẻm, ngách, ngõ..." value="{{ old('address') }}"> <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Thông tin bài viết</legend>
                <div class="form-group">
                    <label for="tf1">Tiêu đề <abbr title="Trường bắt buộc">*</abbr></label>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên" value="{{ old('name') }}">
                    <small class="form-text text-muted">Tối thiểu 30 ký tự, tối đa 99 ký tự</small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Chi tiết thông tin</label>
                    <input name="description" type="text" class="form-control" placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi, gần công viên, gần trường học ... " value="{{ old('description') }}"></input>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('description') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Mô tả về địa chỉ trên bản đồ</label>
                    <input name="google_map" type="text" class="form-control" placeholder="Mô tả trên bản đồ" value="{{ old('google_map') }}"></input>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('google_map') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Cài đặt sản phẩm</legend>
                <div class="row">

                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select name="product_type" class="form-control" id="product_type">
                                <option value="Regular">Sản phẩm thường</option>
                                <option value="Consignment">Sản phẩm ký gửi</option>
                                <option value="deliver_expired">Hết hạn ký gửi</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_type') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2 card-body border-bot">
                        <label>Sản phẩm HOT</label>
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" name="product_hot" {{ old('product_hot') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body border-top">
                <legend>Thông tin bất động sản</legend>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>Mức giá</label>
                            <input name="price" type="text" class="form-control" placeholder="Nhập giá, VD 12000000" value="{{ old('price') }}">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <select name="unit" class="form-control" value="{{ old('unit') }}">
                                <option value="VND">VND</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('unit') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="d-block">Giấy tờ pháp lý</label>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd1" checked="" value="Red book / Pink book">
                        <label class="custom-control-label" for="rd1">Sổ đỏ/ Sổ hồng</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd2" value="Sale contract">
                        <label class="custom-control-label" for="rd2">Hợp đồng mua bán</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd3" value="Waiting for the book">
                        <label class="custom-control-label" for="rd3">Đang chờ sổ</label>
                    </div>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('juridical') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Diện tích</label>
                            <div class="input-group input-group-alt">
                                <input type="text" name="area" type="number" class="form-control" placeholder="Nhập diện tích, VD 80" value="{{ old('area') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">m²</span>
                                </div>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('area') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Hướng nhà</label>
                            <select name="houseDirection" class="form-control">
                                <option value="East">Đông</option>
                                <option value="West">Tây</option>
                                <option value="South">Nam</option>
                                <option value="North">Bắc</option>
                                <option value="Northeast">Đông Bắc</option>
                                <option value="Northwest">Tây Bắc</option>
                                <option value="Southeast">Đông Nam</option>
                                <option value="Southwest">Tây Nam</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('houseDirection') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Đường vào</label>
                            <div class="input-group input-group-alt">
                                <input type="text" name="stress_width" type="number" class="form-control" placeholder="Nhập số" value="{{ old('stress_width') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">m²</span>
                                </div>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('stress_width') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Mặt tiền</label>
                            <div class="input-group input-group-alt">
                                <input type="text" name="facade" type="number" class="form-control" placeholder="Nhập số" value="{{ old('facade') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">m²</span>
                                </div>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('facade') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Hình ảnh & Video</legend>
                <div class="form-group">
                    <label>Chọn nhiều hình ảnh</label>
                    <input type="file" name="image_urls[]" class="form-control" value="{{ old('image_urls[]') }}" multiple>
                </div>
                <div class="form-group">
                    <label for="tf1">Thêm video từ Youtube</label>
                    <input name="linkYoutube" type="text" class="form-control" placeholder="VD: https://www.youtube.com/watch?v=Y-Dw0NpfRug" value="{{ old('linkYoutube') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('linkYoutube') }}</p>
                    @endif
                </div>
            </div>

            <div class="card-body border-top">
                <legend>Thông tin ký gửi</legend>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nhân viên phụ trách</label>
                            <select name="user_id" class="form-control" id='product_user_id'>
                                <option value="">Vui lòng chọn</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tf1">Bắt đầu</label> <input name="product_start_date" type="date" class="form-control" placeholder="" value="{{ old('product_start_date') }}"> <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_start_date') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tf1">Kết thúc</label> <input name="product_end_date" type="date" class="form-control" placeholder="" value="{{ old('product_end_date') }}"> <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_end_date') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body border-top">
                <legend>Thông tin liên hệ</legend>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Chi nhánh</label>
                            <select name="branch_id" class="form-control branch_id">
                                <option value="">Vui lòng chọn</option>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{$branch->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('branch_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nhân viên phụ trách</label>
                            <select name="user_id" class="form-control user_id">
                                <option value="">Vui lòng chọn</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select name="status" class="form-control" value="{{ old('status') }}">
                                <option value="draft">Bản Thảo</option>
                                <option value="selling">Đang Bán</option>
                                <option value="sold">Đã Bán</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('products.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('.province_id').on('change', function() {
            var province_id = jQuery(this).val();

            $.ajax({
                url: "/api/get_districts/" + province_id,
                type: "GET",
                success: function(data) {
                    var districts_html = '<option value="">Vui lòng chọn</option>';
                    for (const district of data) {
                        districts_html += '<option value="' + district.id + '">' +
                            district.name + '</option>';
                    }
                    jQuery('.district_id').html(districts_html);
                }
            });
        });

        jQuery('.district_id').on('change', function() {
            var district_id = jQuery(this).val();
            $.ajax({
                url: "/api/get_wards/" + district_id,
                type: "GET",
                success: function(data) {
                    var wards_html = '<option value="">Vui lòng chọn</option>';
                    for (const ward of data) {
                        wards_html += '<option value="' + ward.id + '">' + ward.name + '</option>';
                    }
                    jQuery('.ward_id').html(wards_html);
                }
            });
        });
        jQuery('.branch_id').on('change', function() {
            var branch_id = jQuery(this).val();
            $.ajax({
                url: "/api/get_users_by_branch_id/" + branch_id,
                type: "GET",
                success: function(data) {
                    var branches_html = '';
                    for (const user of data) {
                        branches_html += '<option value="' + user.id + '">' + user.name + '</option>';
                    }
                    jQuery('.user_id').html(branches_html);
                }
            });
        });

        jQuery('#product_type').on('change', function() {
            var product_user_id = jQuery(this).val();
            $.ajax({
                url: "/api/get_product_type_by_product_user_id/" + product_user_id,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    var product_html = '';
                    for (const user of data) {
                        product_html += '<option value="' + user.id + '">' + user.name + '</option>';
                    }
                    jQuery('#product_user_id').html(product_html);
                }
            });
        });

    });
</script>
@endsection