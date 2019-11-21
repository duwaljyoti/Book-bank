<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('includes.style')
    @yield('header_styles')
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
@include('includes/header')

<!-- Sidebar -->
@include('includes/sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('includes/footer')

</div><!-- ./wrapper -->
@yield('footer_scripts')
<!-- REQUIRED JS SCRIPTS -->

<script src="{{ asset('/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
<script src="{{ asset ("/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/AdminLTE-2.0.5/dist/js/app.min.js") }}" type="text/javascript"></script>
</body>
</html>