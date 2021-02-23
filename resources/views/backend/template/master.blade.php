<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('backend.include.header')

    @include('backend.include.css')

</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.include.menu')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.include.topnav')
    <!-- ########## END: HEAD PANEL ########## -->

    @include('backend.include.rightpanel')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel br-profile-page">

        @yield('body')

        @include('backend.include.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.include.script')
    
</body>
</html>