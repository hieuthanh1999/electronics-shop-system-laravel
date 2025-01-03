<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/admin/dist/css/adminlte.min.css') }}">
</head>
<style>
    .login-page{
        background-image: url({{ asset('asset/client/images/thumb-1920-359089.jpg') }});
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body class="hold-transition login-page">
    @yield('content-auth')
<!-- /.login-box -->
<x-loading />
<!-- jQuery -->
<script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
