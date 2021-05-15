<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta-->
    @include('layouts.customer.meta')
    @yield('title')
    <!--/meta-->

    <!--style-->
    @include('layouts.customer.style')
    
     <!--/style-->

</head>

<body>
    <!-- Search Wrapper Area Start -->
    @include('layouts.customer.wrapper')
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
    
      <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="crafttary"><img src="customer/img/bg-img/16.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- Header Area Start -->
        @include('layouts.customer.header')
        <!-- Header Area End -->
        @yield('content')
        
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    {{-- @include('layouts.customer.newsletter') --}}
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('layouts.customer.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    @include('layouts.customer.script')
    @yield('js')
</body>

</html>