<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts.preloader')
    @include('layouts.nav')
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('content-header')
            </div>
            <!-- Main content -->
            <section class="content">
                @yield('container-fluid')
            </section>
        </div>
   {{-- @include('layouts.footer')--}}
    @include('layouts.control-sidebar')
</div>
@include('layouts.jQuery')
@yield('script')
</body>
</html>
