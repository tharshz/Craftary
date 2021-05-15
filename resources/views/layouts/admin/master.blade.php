<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    @include('layouts.admin.meta')
    @yield('title')
    
    <!--style-->
    @include('layouts.admin.style')
    <!--/style-->

    

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('layouts.admin.navbar')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('layouts.admin.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('layouts.admin.header')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
            @yield('content')
                        </div>
                        
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    
    <!--script-->
    @include('layouts.admin.script')
    @yield('js')
    <!--/script-->

    

</body>

</html>
<!-- end document-->