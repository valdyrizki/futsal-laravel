<aside class="main-sidebar hidden-print">
    <section class="sidebar" id="sidebar-scroll">

        <div class="user-panel">
            <div class="f-left image"><img src="{{asset('assets/images/avatar-1.png')}}" alt="User Image" class="img-circle"></div>
            <div class="f-left info">

                @if (Session::has('name'))
                <p>{{Session::get('name')}}</p>
                @else
                <p>Haloo</p>
                @endif


                <p class="designation">
                        @if (Session::has('level'))
                        {{Fungsi::getLevel(Session::get('level'))}}
                    @else
                        Guest
                    @endif
                     <i class="icofont icofont-caret-down m-l-5"></i></p>
            </div>
        </div>
        <!-- sidebar profile Menu-->
        <ul class="nav sidebar-menu extra-profile-list">
            <li>
                <a class="waves-effect waves-dark" href="profile.html">
                    <i class="icon-user"></i>
                    <span class="menu-text">View Profile</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="javascript:void(0)">
                    <i class="icon-settings"></i>
                    <span class="menu-text">Settings</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="/logout">
                    <i class="icon-logout"></i>
                    <span class="menu-text">Logout</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">Navigation</li>
            <li class="active treeview">
                <a class="waves-effect waves-dark" href="/">
                    <i class="icon-speedometer"></i><span> Dashboard</span>

                </a>
            </li>

            @if (Session::get('level')  == 1)

                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/bookingm">
                        <i class="icon-docs"></i><span> Booking</span>

                    </a>
                </li>

                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/logout">
                        <i class="icon-user"></i><span> Logout</span>
                    </a>
                </li>

            @elseif(Session::get('level')  == 2)
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/booking">
                        <i class="icon-plus"></i><span> Data Booking</span>

                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/lapang">
                        <i class="icofont icofont-company"></i><span> Lapang</span>

                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/logout">
                        <i class="icon-logout"></i><span> Logout</span>
                    </a>
                </li>

                @elseif(Session::get('level')  == 3)
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/booking">
                        <i class="icon-plus"></i><span> Data Booking</span>

                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/lapang">
                        <i class="icon-doc"></i><span> Data Lapang</span>

                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/user">
                        <i class="icon-user"></i><span> Data Admin</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/laporan">
                        <i class="icon-docs"></i><span> Laporan</span>

                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/logout">
                        <i class="icon-logout"></i><span> Logout</span>
                    </a>
                </li>
            @else
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="/login">
                        <i class="icon-login"></i><span> Login</span>
                    </a>
                </li>
            @endif

        </ul>
    </section>
</aside>
