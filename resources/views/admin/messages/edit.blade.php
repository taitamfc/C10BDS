@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('messages.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Tin Nhắn</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Chỉnh Sửa Tin Nhắn</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('messages.update',$message->id)}}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="tf1">Tiêu Đề<abbr name="Trường bắt buộc">*</abbr></label> <input name="title" type="text" class="form-control" value="{{ $message->title }}" id="" placeholder="Nhập tiêu đề tin nhắn">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Nội Dung<abbr name="Trường bắt buộc">*</abbr></label> <textarea name="content" type="text" class="form-control" id="" placeholder="Nhập nội dung tin nhắn"> {{ $message->content }}</textarea>
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('content') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Kiểu Tin Nhắn</label>
                            <select class="form-select form-control" name="type" id="type">
                                <option value="instant_send" @selected( $message->type == 'instant_send')>Gửi Tức Thì</option>
                                <option value="time_to_send" @selected( $message->type == 'time_to_send')>Hẹn Thời Gian Gửi</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('type') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tf1">Trạng Thái</label>
                            <select class="form-select form-control" name="status">
                                <option value="draft" @selected( $message->status == 'draft')>Bản thảo</option>
                                <option value="waiting" @selected( $message->status == 'waiting')>Chờ gửi</option>
                                <option value="sent" @selected( $message->status == 'sent')>Đã gửi</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group showdateCommission" style="display:none">
                    <label for="tf1">Ngày Gửi<abbr name="Trường bắt buộc">*</abbr></label> <input name="date_send" type="date" class="form-control" value="{{ $message->date_send }}" id="">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('date_send') }}</p>
                    @endif
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('messages.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    jQuery(document).ready(function() {
        jQuery('#type').on('change', function() {
            var type = jQuery(this).val();
            console.log(type);
            if (type == 'instant_send') {
                $('.showIfMessageConsignment').show();
            } else {
                $('.showIfMessageConsignment').hide();
            }
        });
        jQuery('#type').on('change', function() {
            var type = jQuery(this).val();
            console.log(type);
            if (type == 'time_to_send') {
                $('.showdateCommission').show();
            } else {
                $('.showdateCommission').hide();
            }
        });
    });
</script>

@endsection