@extends('admin.layouts.master')
@section('content')

<!-- .page-title-bar -->
<header class="page-title-bar">
@if (Session::has('succes'))
    <div class="alert alert-success">{{session::get('succes')}}</div>
    @endif
    <div class="d-flex flex-column flex-md-row">

        <p class="lead">
            <span class="font-weight-bold">Xin chào, {{ $current_user->name}}.</span> 
            <span class="d-block text-muted">Chúc bạn một ngày làm việc tốt lành !</span>
        </p>
        <div class="ml-auto">

        </div>
    </div>
</header><!-- /.page-title-bar -->
<!-- .page-section -->
<div class="page-section">
    <!-- .section-block -->
    <div class="section-block">
        <!-- metric row -->
        <div class="metric-row">
            <div class="col-lg-12">
                <div class="metric-row metric-flush">
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="javascript:;" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Tổng Sản Phẩm </h2>
                            <p class="metric-value h3">
                                <span class="value">{{ $product_count }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="javascript:;" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Tổng Khách Hàng </h2>
                            <p class="metric-value h3">
                                <span class="value">{{ $customer_count }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="javascript:;" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Tổng Doanh Thu </h2>
                            <p class="metric-value h3">
                                <span class="value">{{ $product_price }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                </div>
            </div><!-- metric column -->
        </div><!-- /metric row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-fluid">
                    <div class="card-header"> Sản Phẩm Mới</div><!-- .lits-group -->
                    <div class="lits-group list-group-flush">
                        @foreach( $new_products as $product )
                        <div class="list-group-item">
                            <div class="list-group-item-body">
                                <h5 class="card-title">
                                <a href="{{route('products.edit',$product->id)}}">{{ $product->name }}</a>
                                </h5>
                                <p class="card-subtitle text-muted mb-1"> {{ $product->address }} </p><!-- .progress -->
                                <!-- /.progress -->
                            </div><!-- .lits-group-item-body -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-fluid">
                    <div class="card-header"> Khách Hàng Mới</div><!-- .lits-group -->
                    <div class="lits-group list-group-flush">
                        @foreach( $new_customers as $customer )
                        <div class="list-group-item">
                            <div class="list-group-item-body">
                                <h5 class="card-title">
                                <a href="{{route('customers.edit',$customer->id)}}">{{ $customer->name }}</a>
                                </h5>
                                <p class="card-subtitle text-muted mb-1"> {{ $customer->phone }} </p><!-- .progress -->
                                <!-- /.progress -->
                            </div><!-- .lits-group-item-body -->
                        </div>
                        @endforeach
                    </div><!-- /.lits-group -->
                </div>
            </div>
        </div>
    </div><!-- /.section-block -->
</div><!-- /.page-section -->

@endsection