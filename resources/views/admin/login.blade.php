<!DOCTYPE html>
<html lang="en">

<head>
<!-- Original URL: http://www.urbanui.com/serein/template/demo/vertical-default-light/pages/samples/login-2.html
Date Downloaded: 11/30/2018 1:56:42 PM !-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="{{asset('')}}">
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Serein Admin</title>
  <!-- plugins:css -->
    <link rel="stylesheet" href="admin/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
    <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="admin/images/logo.svg" alt="logo" />
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" action="admin/login">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="email" placeholder="email" value="{{old('email')}}"/>
                  @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" />
                  @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                @if(session('login_error'))
                <div class="alert alert-danger">{{session('login_error')}}</div>
                @endif
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  value="SIGN IN" />
                  {{--<a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>--}}
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember_me" class="form-check-input" />
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
               
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
    <script src="admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="admin/js/off-canvas.js"></script>
    <script src="admin/js/hoverable-collapse.js"></script>
    <script src="admin/js/template.js"></script>
    <script src="admin/js/settings.js"></script>
    <script src="admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="admin/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  <!-- endinject -->
</body>

</html>

