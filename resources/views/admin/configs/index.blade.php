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
                <h6 class="card-header"> Your Details </h6><!-- .nav -->
                <nav class="nav nav-tabs flex-column border-0">
                    <a href="user-profile-settings.html" class="nav-link">Profile</a> <a href="user-account-settings.html" class="nav-link active">Account</a> <a href="user-billing-settings.html" class="nav-link">Billing</a> <a href="user-notification-settings.html" class="nav-link">Notifications</a>
                </nav><!-- /.nav -->
            </div><!-- /.card -->
        </div><!-- /grid column -->
        <!-- grid column -->
        <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
                <h6 class="card-header"> Account </h6><!-- .card-body -->
                <div class="card-body">
                    <!-- form -->
                    <form method="post">
                        <!-- form row -->
                        <div class="form-row">
                            <!-- form column -->
                            <div class="col-md-6 mb-3">
                                <label for="input01">First Name</label> <input type="text" class="form-control" id="input01" value="Beni" required="">
                            </div><!-- /form column -->
                            <!-- form column -->
                            <div class="col-md-6 mb-3">
                                <label for="input02">Last Name</label> <input type="text" class="form-control" id="input02" value="Arisandi" required="">
                            </div><!-- /form column -->
                        </div><!-- /form row -->
                        <!-- .form-group -->
                        <div class="form-group">
                            <label for="input03">Email</label> <input type="email" class="form-control" id="input03" value="bent10@looper.com" required="">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                            <label for="input04">New Password</label> <input type="password" class="form-control" id="input04" value="secret" required="">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                            <label for="input05">Username</label> <input type="text" class="form-control" id="input05" value="bent10" required=""> <small class="text-muted">Dolores reiciendis, eos accusamus nobis at omnis consequuntur culpa tempore saepe animi.</small>
                        </div><!-- /.form-group -->
                        <hr>
                        <!-- .form-actions -->
                        <div class="form-actions">
                            <!-- enable submit btn when user type their current password -->
                            <input type="password" class="form-control mr-3" id="input06" placeholder="Enter Current Password" required=""> <button type="submit" class="btn btn-primary text-nowrap ml-auto" disabled="">Update Account</button>
                        </div><!-- /.form-actions -->
                    </form><!-- /form -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /grid column -->
    </div><!-- /grid row -->
</div><!-- /.page-section -->


@endsection