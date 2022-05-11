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
    <h1 class="page-title"> Chỉnh sửa sản phẩm</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('products.update',$product->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="exampleInputEmail1">Loại bất động sản (Tên)</label>
                    <select name="product_category_id" class="form-control">
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
                            <label for="exampleInputEmail1">Tỉnh/Thành phố<abbr
                                    title="Trường bắt buộc">*</abbr></label>
                            <select name="province_id" class="form-control province_id">
                                <option value="">Vui lòng chọn</option>
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}" @selected( $product->province_id == $province->id )>
                                    {{ $province->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('province_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quận/Huyện<abbr title="Trường bắt buộc">*</abbr></label>
                            <select name="district_id" class="form-control district_id">
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" @selected(old('district')==$district)>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('district_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xã/Phường<abbr title="Trường bắt buộc">*</abbr></label>
                            <select name="ward_id" class="form-control ward_id">
                                @foreach($wards as $ward)
                                <option value="{{ $ward->id }}" @selected(old('ward')==$ward)>
                                    {{ $ward->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('ward_id')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Địa chỉ<abbr title="Trường bắt buộc">*</abbr></label> <input name="address"
                        type="text" class="form-control" placeholder="Bạn có thể bổ sung hẻm, ngách, ngõ..."
                        value="{{ $product->address }}"> <small class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Thông tin bài viết</legend>
                <div class="form-group">
                    <label for="tf1">Tiêu đề <abbr title="Trường bắt buộc">*</abbr></label>
                    <input name="name" type="text" value="{{ $product->name }}" class="form-control"
                        placeholder="Nhập tên">
                    <small class="form-text text-muted">Tối thiểu 30 ký tự, tối đa 99 ký tự</small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Chi tiết thông tin <abbr title="Trường bắt buộc">*</abbr></label>
                    <textarea name="description" type="text" class="form-control"
                        placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi, gần công viên, gần trường học ... ">{{ $product->description }}</textarea>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('description') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Mô tả về địa chỉ trên bản đồ</label>
                    <input name="google_map" type="text" class="form-control" placeholder="Mô tả trên bản đồ"
                        value="{{ $product->google_map }}"></input>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('google_map') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Cài đặt sản phẩm</legend>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select name="product_type" class="form-control" id="product_type">
                                <option value="Regular" @selected( $product->product_type == 'Regular')>Sản phẩm thường
                                </option>
                                <option value="Consignment" @selected( $product->product_type == 'Consignment')>Sản phẩm
                                    ký gửi</option>
                                <option value="Block" @selected( $product->product_type == 'Block')>Sản phẩm block
                                </option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_type') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Sản phẩm HOT</label>
                        <div class="form-group">
                            <label class="switcher-control">
                                <input type="hidden" name="product_hot" value="0">
                                <input type="checkbox" class="switcher-input" name="product_hot" @checked(
                                    $product->product_hot == 1) value="1">
                                <span class="switcher-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Sắp mở bán</label>
                        <div class="form-group">
                            <label class="switcher-control">
                                <input type="hidden" name="product_open" value="0">
                                <input type="checkbox" class="switcher-input" name="product_open" value="1" @checked(
                                    $product->product_open == 1 )>
                                <span class="switcher-indicator"></span>
                            </label>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_open') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tf1">Ngày mở bán</label> <input name="product_open_date" type="date"
                                class="form-control" placeholder="" value="{{ $product->product_open_date }}">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_open_date') }}</p>
                            @endif
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
                            <input name="price" type="text" class="form-control" placeholder="Nhập giá, VD 12000000"
                                value="{{ $product->price }}">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <select name="unit" class="form-control">
                                <option value="VND" @selected( $product->unit == 'VND')>VND</option>
                                <option value="m2" @selected( $product->unit == 'm2')>Giá / m²</option>
                                <option value="agree" @selected( $product->unit == 'agree')>Thoả thuận</option>
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
                        <input type="radio" class="custom-control-input" name="juridical" id="rd1" @checked(
                            $product->juridical == 'red_book_pink_book') value="red_book_pink_book">
                        <label class="custom-control-label" for="rd1">Sổ đỏ/ Sổ hồng</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd2" @checked(
                            $product->juridical == 'sale_contract') value="Sale contract">
                        <label class="custom-control-label" for="rd2">Hợp đồng mua bán</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd3" @checked(
                            $product->juridical == 'waiting_book') value="waiting_book">
                        <label class="custom-control-label" for="rd3">Đang chờ sổ</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd4" @checked(
                            $product->juridical == 'split_plot') value="split_plot">
                        <label class="custom-control-label" for="rd4">Tách thửa</label>
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
                                <input type="text" value="{{ $product->area }}" name="area" type="number"
                                    class="form-control" placeholder="Nhập diện tích, VD 80">
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
                                <input type="text" value="{{ $product->stress_width }}" name="stress_width"
                                    type="number" class="form-control" placeholder="Nhập số">
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
                                <input type="text" value="{{ $product->facade }}" name="facade" type="number"
                                    class="form-control" placeholder="Nhập số">
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
                    <input type="file" name="image_urls[]" class="form-control" value="{{ old('image_urls[]') }}"
                        multiple>
                </div>
                @if( $product->product_images )
                <div class="form-group row">
                    @foreach( $product->product_images as $product_image )
                    <div class="col-lg-2">
                        <div class="card card-figure">
                            <figure class="figure">
                                <div class="figure-img">
                                    <img class="img-fluid" src="{{ $product_image->image_url }}">
                                    <a target="_blank" href="{{ $product_image->image_url }}" class="img-link" data-size="600x450">
                                        <span class="tile tile-circle bg-danger"><span class="oi oi-eye"></span></span>
                                        <span class="img-caption d-none">Image caption goes here</span>
                                    </a>
                                    <div class="figure-action">
                                        <a href="javascript:;" class="btn btn-block btn-sm btn-primary">Xóa</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="form-group">
                    <label for="tf1">Thêm video từ Youtube</label>
                    <input name="linkYoutube" value="{{ $product->linkYoutube }}" type="text" class="form-control"
                        placeholder="VD: https://www.youtube.com/watch?v=Y-Dw0NpfRug">
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
                            <select name="user_contact_id" class="form-control">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user')==$user)>
                                    {{ $user->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tf1">Bắt đầu</label> <input name="product_start_date" type="date"
                                class="form-control" placeholder="" value="{{$product->product_start_date}}">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('product_start_date') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tf1">Kết thúc</label> <input name="product_end_date" type="date"
                                class="form-control" placeholder="" value="{{$product->product_end_date}}">
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
                                <option value="">Chọn chi nhánh</option>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" @selected(old('branch')==$branch)>
                                    {{ $branch->name }}
                                </option>
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
                                <option value="">Chọn nhân viên</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user')==$user)>
                                    {{ $user->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select name="status" class="form-control">
                                <option value="draft" @selected($product->status == 'draft') >Bản Thảo</option>
                                <option value="selling" @selected($product->status == 'selling') >Đang Bán</option>
                                <option value="sold" @selected($product->status == 'sold')>Đã Bán</option>
                                <option value="expried" @selected($product->status == 'expried')>Hết Hạn</option>
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
                    wards_html += '<option value="' + ward.id + '">' + ward.name +
                        '</option>';
                }
                jQuery('.ward_id').html(wards_html);
            }
        });
    });
    jQuery('.branch_id').on('change', function() {
        var branch_id = jQuery(this).val();
        if (branch_id) {
            $.ajax({
                url: "/api/get_users_by_branch_id/" + branch_id,
                type: "GET",
                success: function(data) {
                    var branches_html = '';
                    for (const user of data) {
                        branches_html += '<option value="' + user.id + '">' + user.name +
                            '</option>';
                    }
                    jQuery('.user_id').html(branches_html);
                }
            });
        } else {
            jQuery('.user_id').html('<option value="">Chọn nhân viên</option>');
        }

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
                    product_html += '<option value="' + user.id + '">' + user.name +
                        '</option>';
                }
                jQuery('#product_user_id').html(product_html);
            }
        });
    });
});
</script>
@endsection