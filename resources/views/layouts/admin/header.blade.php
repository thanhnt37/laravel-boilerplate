<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{$unreadNotificationCount}}</span>
                    </a>
                    <ul class="dropdown-menu" style="width: 500px;">
                        <li class="header">{{'You have '.$unreadNotificationCount.' messages'}}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" style="max-height: 400px;">
                                @foreach($notifications as $notification)
                                    <li @if($notification->read ==0) style="background-color: #edf2fa" @endif><!-- start message -->
                                        <a href="{!! action('Admin\AdminUserNotificationController@show', $notification->id) !!}" style="white-space: inherit;">
                                            <div class="pull-left">
                                                <img src="{!! \URLHelper::asset('libs/adminlte/img/user2-160x160.jpg','admin') !!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                System Messages

                                                <small>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                    $date = new DateTime( $notification->created_at );
                                                    $now = new DateTime();

                                                    echo $date->diff( $now )
                                                            ->format( "%d days, %h hours and %i minutes ago" );
                                                    ?>
                                                </small>
                                            </h4>
                                            <p>{{ substr($notification->content, 0, 180) }}@if( strlen($notification->content) > 180 )...@endif</p>
                                        </a>
                                    </li>
                                @endforeach
                                <!-- end message -->
                            </ul>
                        </li>
                        <li id="loadding" class="hidden">
                            Loadding ...
                        </li>
                        <li class="footer"><a href="{!! action('Admin\AdminUserNotificationController@index') !!}">See All Messages</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! \URLHelper::asset('libs/adminlte/img/user2-160x160.jpg','admin') !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! \URLHelper::asset('libs/adminlte/img/user2-160x160.jpg','admin') !!}" class="img-circle" alt="User Image">

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('Admin\MeController@index') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form id="signout" method="post" action="{!! URL::action('Admin\AuthController@postSignOut') !!}">{!! csrf_field() !!}</form>
                                <a href="#" class="btn btn-default btn-flat" onclick="$('#signout').submit(); return false;">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <div id="language-switcher" class="flagstrap" data-selected-country="{{strtoupper(\App::getLocale())}}" style="margin: 10px 10px 0 0;"></div>
                </li>
            </ul>
        </div>
    </nav>
</header>