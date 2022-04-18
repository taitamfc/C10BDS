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
    <h1 class="page-title"> Thêm Sản Phẩm</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('products.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="exampleInputEmail1">Loại bất động sản</label>
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
                            <select name="_id" class="form-control district_id">
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
                <div class="form-group">
                    <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form-control"
                        placeholder="Bạn có thể bổ sung hẻm, ngách, ngõ..."> <small
                        class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Thông tin bài viết</legend>
                <div class="form-group">
                    <label for="tf1">Tiêu đề <abbr title="Trường bắt buộc">*</abbr></label>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên">
                    <small class="form-text text-muted">Tối thiểu 30 ký tự, tối đa 99 ký tự</small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Chi tiết thông tin</label>
                    <textarea name="description" type="text" class="form-control"
                        placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi, gần công viên, gần trường học ... "></textarea>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body border-top">
                <legend>Thông tin bất động sản</legend>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>Mức giá</label>
                            <input name="price" type="text" class="form-control" placeholder="Nhập giá, VD 12000000">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <select name="unit" class="form-control">
                                <option value="VND">VND</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="d-block">Giấy tờ pháp lý</label>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd1" checked=""
                            value="Sổ đỏ/ Sổ hồng">
                        <label class="custom-control-label" for="rd1">Sổ đỏ/ Sổ hồng</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd2"
                            value="Hợp đồng mua bán">
                        <label class="custom-control-label" for="rd2">Hợp đồng mua bán</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="juridical" id="rd3" value="Đang chờ sổ">
                        <label class="custom-control-label" for="rd3">Đang chờ sổ</label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Diện tích</label>
                            <div class="input-group input-group-alt">
                                <input type="text" name="area" type="number" class="form-control"
                                    placeholder="Nhập diện tích, VD 80">
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
                                <option value="VND">Đông</option>
                                <option value="VND">Tây</option>
                                <option value="VND">Nam</option>
                                <option value="VND">Bắc</option>
                                <option value="VND">Đông Bắc</option>
                                <option value="VND">Tây Bắc</option>
                                <option value="VND">Đông Nam</option>
                                <option value="VND">Tây Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Đường vào</label>
                            <div class="input-group input-group-alt">
                                <input type="text" name="stress_width" type="number" class="form-control"
                                    placeholder="Nhập số">
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
                                <input type="text" name="facade" type="number" class="form-control"
                                    placeholder="Nhập số">
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
                    <div id="dropzone" class="fileinput-dropzone">
                        <span>Bấm chọn ảnh cần tải lên.</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload-dropzone" type="file" name="product_images[]" multiple="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Thêm video từ Youtube</label>
                    <input name="linkYoutube" type="text" class="form-control"
                        placeholder="VD: https://www.youtube.com/watch?v=Y-Dw0NpfRug">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('linkYoutube') }}</p>
                    @endif
                </div>

                
            </div>
            <div class="card-body border-top">
                <legend>Thông tin liên hệ</legend>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Chi nhánh</label>
                            <select name="branch_id" class="form-control">
                                <option value="VND">VND</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nhân viên phụ trách</label>
                            <select name="user_id" class="form-control">
                                <option value="VND">VND</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn btn-secondary float-right"
                        onclick="window.history.go(-1); return false;">Hủy</button>
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
});
</script>
@endsection