<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="{{ route('backend.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    ড্যাশবোর্ড
                </a>
                {{-- <div class="sb-sidenav-menu-heading" style="font-size: 20px;">ম্যানেজমেন্ট</div> --}}
                @if(auth()->user()->permission == 1)
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        দপ্তর ব্যাবস্থাপনা
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('backend.notice') }}">নোটিশ</a>
                            <a class="nav-link" href="{{ route('backend.event') }}">ইভেন্ট</a>
                            <a class="nav-link" href="{{ route('backend.gallery') }}">গ্যালারী</a>
                            <a class="nav-link" href="{{ route('backend.contact_us') }}">মেসেজ</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts_a" aria-expanded="false" aria-controls="collapseLayouts_a">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        প্রশাসনিক ব্যাবস্থাপনা
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts_a" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('backend.teacher') }}">শিক্ষক</a>
                            <a class="nav-link" href="{{ route('backend.committee') }}">কমিটি</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts_b" aria-expanded="false" aria-controls="collapseLayouts_b">
                        <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                        ছাত্র-ছাত্রী ব্যাবস্থাপনা
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts_b" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('backend.students') }}">সকল ছাত্র-ছাত্রী</a>
                            <a class="nav-link" href="{{ route('backend.stipend_students') }}">বৃত্তিপ্রাপ্ত ছাত্র-ছাত্রী</a>
                        </nav>
                    </div>

                    @if(auth()->user()->role == 2)
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts_u" aria-expanded="false" aria-controls="collapseLayouts_u">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            ইউজার
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts_u" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('backend.users') }}">সকল ইউজার</a>
                                {{-- <a class="nav-link" href="{{ route('backend.stipend_students') }}">বৃত্তিপ্রাপ্ত ছাত্র-ছাত্রী</a> --}}
                            </nav>
                        </div>
                    @endif

                @endif



                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    ইউজার
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> --}}


                {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="text-white">আপনার রোলঃ
                <span class="text-warning">
                    @if(auth()->user()->role == 0)
                    সাধারণ
                    @elseif(auth()->user()->role == 1)
                    এডমিন
                    @elseif(auth()->user()->role == 2)
                    সুপার এডমিন
                    @endif
                </span>
            </div>
        </div>
    </nav>
</div>