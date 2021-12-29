@extends('layouts.auth.login')
@section('form_login')
<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
    <span>Login with Modern</span>
  </h6>
</div>
<div class="card-content">
  <div class="card-body">
    @include('inc.alerts.error')
    @include('inc.alerts.success')
    <form class="form-horizontal form-simple" method="POST" action="{{ route('admin.post_login') }}" novalidate>
        @csrf
      <fieldset class="form-group position-relative has-icon-left mb-0">
        <input type="email" class="form-control form-control-lg input-lg"  name="email" placeholder="Your Email"
        required>
        <div class="form-control-position">
          <i class="ft-user"></i>
        </div>
      </fieldset>
      <fieldset class="form-group position-relative has-icon-left">
        <input type="password" class="form-control form-control-lg input-lg" name="password" id="user-password"
        placeholder="Enter Password" required>
        <div class="form-control-position">
          <i class="la la-key"></i>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-md-6 col-12 text-center text-md-left">
          <fieldset>
            <input type="checkbox" id="remember-me" class="chk-remember">
            <label for="remember-me"> Remember Me</label>
          </fieldset>
        </div>
        <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
      </div>
      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
    </form>
  </div>
</div>
@endsection