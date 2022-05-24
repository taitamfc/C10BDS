@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('papers.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Giấy Tờ Pháp Lý</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm Giấy Tờ</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('papers.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên giấy tờ<abbr name="Trường bắt buộc">*</abbr></label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên giấy tờ pháp lý">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="tf1">Trạng Thái</label>
                        <select class="form-select form-control" name="status" value="{{ old('status') }}">
                            <option value="draft" @selected(old('status')=='draft' )>Bản thảo</option>
                            <option value="active" @selected(old('status')=='active' )>Hoạt Động</option>
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('status') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('papers.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- <script>
    //khi tài liệu đã sẵn sàng thì thực hiện đoạn mã trong khối lệnh
    jQuery(document).ready(function() {
        //tìm phần tử có class province_id bắt sự kiện onchange
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
            //tạo biến _id = đối tượng this với gtri hiện tại
            var district_id = jQuery(this).val();
            $.ajax({
                //đường dẫn mình gọi đến
                url: "/api/get_wards/" + district_id,
                //phương thức : Get/POST
                type: "GET",
                success: function(data) {
                    //tạo biến html = cặp thẻ option
                    var wards_html = '<option value="">Vui lòng chọn</option>';
                    for (const ward of data) {
                        //data là một mảng chứa các đối tượng
                        //sử dụng toán tử để tạo một đối tượng mới.
                        wards_html += '<option value="' + ward.id + '">' + ward.name +
                            '</option>';
                    }
                    jQuery('.ward_id').html(wards_html);
                }
            });
        });
    });
    //jQuery là một thẻ script viết lại
</script> -->

@endsection
