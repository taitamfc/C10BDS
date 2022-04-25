@extends('admin.layouts.login')
@section('content')
<form action="{{ route('postLogin') }}" method="post" class="auth-form">
@csrf
  <!-- .form-group -->
  <div class="form-group">
    <div class="form-label-group">
      <input type="text" id="inputUser" class="form-control" name="email" value="{{old('email')}}" placeholder="email" autofocus=""> <label for="inputUser">Email</label>
      @if ($errors->any())
      <p style="color:red">{{ $errors->first('email') }}</p>
      @endif
    </div>
  </div><!-- /.form-group -->
  <!-- .form-group -->
  <div class="form-group">
    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" name="password"  value="{{old('password')}}" placeholder="Mật khẩu"> <label for="inputPassword">Mật khẩu</label>

      @if ($errors->any())
      <p style="color:red">{{ $errors->first('password') }}</p>
      @endif
    </div>
  </div><!-- /.form-group -->
  <!-- .form-group -->
  <div class="form-group">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
  </div><!-- /.form-group -->
  <!-- .form-group -->
  <div class="form-group text-center">
    <div class="custom-control custom-control-inline custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Lưu thông tin</label>
    </div>
  </div><!-- /.form-group -->
  <!-- recovery links -->

</form><!-- /.auth-form -->


@endsection