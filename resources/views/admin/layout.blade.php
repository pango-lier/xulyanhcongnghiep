<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
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
    @yield('css')
</head>

<body class="sidebar-dark">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
     @include('admin.inc.header')   
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
         @include('admin.inc.themesetting')   
         @include('admin.inc.rightbar')   
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
         @include('admin.inc.leftbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
          @yield('content')  
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
          @include('admin.inc.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="/admin/vendors/js/vendor.bundle.addons.js"></script>
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
    @yield('js')
</body>

</html>