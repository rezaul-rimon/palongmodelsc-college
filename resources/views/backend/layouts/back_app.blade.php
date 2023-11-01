@include('backend.layouts.header')
@include('backend.layouts.top-nav')

        <div id="layoutSidenav">
            @include('backend.layouts.side-nav')

            <div id="layoutSidenav_content">
                @yield('content')
                
                @include('backend.layouts.footer')
            </div>
        </div>
@include('backend.layouts.footer-down')
