<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CRM</title>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/modal-window-effects/css/md-modal.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/material/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/data-tables/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput-latest/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    


</head>
<body>

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
       
    </div>
    <!-- [ Pre-loader ] End -->

    @include('common.menu')	
   

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="{{route('dashboard')}}" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">CRM</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <!-- <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li>                
            </ul> -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">mark as read</a>
                                    <a href="javascript:">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{asset('images/user/avatar-1.jpg')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{asset('images/user/avatar-2.jpg')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{asset('images/user/avatar-3.jpg')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="javascript:">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="javascript:" class="displayChatbox"><i class="icon feather icon-mail"></i></a></li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{asset('images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>
                                <a href="{{ route('logout') }}" class="dud-logout" title="Logout" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="/profile/setting" class="dropdown-item"><i class="feather icon-settings"></i> Einstellungen</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Profil</a></li>
                                <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> Meine Nachrichten</a></li>
                                <li><a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="feather icon-lock"></i> Bildschirmspere</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    @yield('content')

   
    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/pcoded.js')}}"></script>

    
    <script src="{{ asset('plugins/todo/js/todo.js')}}"></script>
    <!-- modal-window-effects Js -->
   
    <script src="{{ asset('plugins/data-tables/js/datatables.min.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/numeric-comma.js"></script>
    <script src="{{ asset('plugins/bootstrap-tagsinput-latest/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('js/pages/tbl-datatable-custom.js')}}"></script>

</body>
</html>
