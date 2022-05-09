@extends('admin.layouts.master')
@section('content')


<!-- .page-title-bar -->
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="user-profile.html"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Overview</a>
            </li>
        </ol>
    </nav>
</header><!-- /.page-title-bar -->
<!-- .page-section -->
<div class="page-section">
    <!-- grid row -->
    <div class="row">
        <!-- grid column -->
        <div class="col-lg-4">
            <!-- .card -->
            <div class="card card-fluid">
                <h6 class="card-header"> Cấu Hình Hệ Thống </h6><!-- .nav -->
                <nav class="nav nav-tabs flex-column border-0">
                    @foreach( $option_groups as $option_group => $options )
                    <a href="#{{ $option_group }}" class="nav-link">{{ $option_group }}</a> 
                    @endforeach
            </div><!-- /.card -->
        </div><!-- /grid column -->
        <!-- grid column -->
        <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
                @foreach( $option_groups as $option_group => $options )
                <h6 class="card-header"> {{ $option_group }} </h6><!-- .card-body -->
                <div class="card-body" id="{{ $option_group }}">
                    <!-- form -->
                    <form method="post" action="{{route('configs.store')}}">
                    @csrf
                        @foreach( $options as $option )
                        <div class="form-group">
                        <label>{{ $option->option_label }}</label> 
                            @switch($option->option_type)
                                @case('text')
                                @case('number')
                                @case('email')
                                    <input type="{{ $option->option_type }}" name="{{ $option_group }}[{{ $option->option_name }}]" class="form-control" value="{{ $option->option_value }}">
                                    @break
                                @case('checkbox')
                                    <input type="hidden" name="{{ $option_group }}[{{ $option->option_name }}]" value="0">
                                    <label class="switcher-control float-right">
                                        <input type="checkbox" 
                                        @checked( $option->option_value == 1 )
                                        name="{{ $option_group }}[{{ $option->option_name }}]" class="switcher-input" value="{{ $option->option_value }}" > 
                                        <span class="switcher-indicator"></span>
                                    </label> 
                                    @break
                            @endswitch
                        </div><!-- /.form-group -->
                        @endforeach
                        <div class="form-group">
                            <button class="btn btn-warning float-right" type="submit" value="Lưu">Lưu</button>
                        </div>
                    </form><!-- /form -->
                </div><!-- /.card-body -->
                
                @endforeach
            </div><!-- /.card -->
        </div><!-- /grid column -->
    </div><!-- /grid row -->
</div><!-- /.page-section -->


@endsection