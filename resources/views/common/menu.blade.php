 <!-- [ navigation menu ] start -->
 <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="{{route('dashboard')}}" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">GERMEDA</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">               
                   
                
                <ul class="nav pcoded-inner-navbar">
                    @if(Auth::user()->type==2 || Auth::user()->type==1)
                        <li class="nav-item pcoded-menu-caption">
                            <label>Admin</label>
                        </li>
                    @endif
                    @if(Auth::user()->type==2)
                        <li data-username="User" class="nav-item">
                            <a href="{{route('usermanagement')}}" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="feather icon-users"></i>
                                </span>
                                <span class="pcoded-mtext">User Management</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==2 || Auth::user()->type==1)
                        <li data-username="User" class="nav-item">
                            <a href="{{route('logs')}}" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="feather icon-layers"></i>
                                </span>
                                <span class="pcoded-mtext">Logs</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>

                    <li data-username="Clients" class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-users"></i>
                            </span>
                            <span class="pcoded-mtext">Patienten</span>
                        </a>
                    </li>
                    <li data-username="todos" class="nav-item">
                        <a href="{{route('todoAction')}}" class="nav-link">
                            <span class="pcoded-micon">
                                <i class="mdi mdi-note-outline"></i>
                            </span>
                            <span class="pcoded-mtext">Übergabe</span>
                        </a>
                    </li>

                    <!-- <li data-username="task" class="nav-item">
                        <a href="" class="nav-link">
                            <span class="pcoded-micon">
                                <i class="mdi mdi-note-outline"></i>
                            </span>
                            <span class="pcoded-mtext">Task</span>
                        </a>
                    </li> -->


                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->