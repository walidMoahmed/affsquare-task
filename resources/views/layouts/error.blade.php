<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">


<!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @yield('content-header')
        </div>
        <!-- Main content -->

            @yield('container-fluid')
    </div>
    @include('layouts.footer')
    @include('layouts.control-sidebar')
    @yield('script')
@include('layouts.jQuery')
</body>
</html>