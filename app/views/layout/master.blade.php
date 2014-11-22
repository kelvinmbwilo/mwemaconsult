<!DOCTYPE html>
@if(Auth::guest())
{{  Redirect::to("/")  }}
@else
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

    <title>Mwema Advocate</title>

    <!--Core CSS -->
    {{ HTML::style("bs3/css/bootstrap.min.css") }}
    {{ HTML::style("css/bootstrap-reset.css") }}
    {{ HTML::style("font-awesome/css/font-awesome.css") }}

    <!--dynamic table-->
    {{ HTML::style("js/advanced-datatable/css/demo_page.css") }}
    {{ HTML::style("js/advanced-datatable/css/demo_table.css") }}
    {{ HTML::style("js/data-tables/DT_bootstrap.css") }}
    <!-- Custom styles for this template -->
    {{ HTML::style("css/style.css") }}
    {{ HTML::style("css/style-responsive.css") }}

    <!--jquery-->
    {{ HTML::script("js/jquery.js") }}
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    {{ HTML::script("js/ie8-responsive-file-warning.js") }}<![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{ url('dashboard') }}" class="logo" style="margin: 0px">
        <img src ="{{ asset("images/logo1.png") }}" style='height:85px;width:100%'>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">

    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="blank.html#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="blank.html#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="blank.html#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="blank.html#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle icon-user" href="blank.html#">
                <!--<img alt="" src="images/avatar1_small.jpg">-->
                <i class="fa fa-user"></i>
                <span class="username">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{ url('profile') }}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="{{ url('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                @if(Auth::user()->role == 'company')
                <li>
                    <a href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('order/new') }}">
                        <i class="fa fa-plus-square"></i>
                        <span>New Order</span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="fa fa-th-list"></i>
                        <span>View Orders</span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="fa fa-user"></i>
                        <span>Company Users</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('companies') }}">
                        <i class="fa fa-briefcase"></i>
                        <span>Companies</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub">
                        <li><a href="boxed_page.html">Manage</a></li>
                        <li><a href="horizontal_menu.html">Place Order</a></li>
                        <li><a href="language_switch.html">Manage My Orders</a></li>
                    </ul>
                </li>
                @if(Auth::user()->role == "admin")
                <li>
                    <a href="{{ url('users') }}">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endif
                @endif
            </ul></div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        @yield('heading1')

                    </header>
                    <div class="panel-body">
                        @yield('contents')
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
{{ HTML::script("bs3/js/bootstrap.min.js") }}
{{ HTML::script("js/jquery.form.js") }}
{{ HTML::script("js/jquery.dcjqaccordion.2.7.js") }}
{{ HTML::script("js/jquery.scrollTo.min.js") }}
{{ HTML::script("js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js") }}
{{ HTML::script("js/jquery.nicescroll.js") }}
<!--dynamic table-->
{{ HTML::script("js/advanced-datatable/js/jquery.dataTables.js") }}
{{ HTML::script("js/data-tables/DT_bootstrap.js") }}
{{ HTML::script("js/scripts.js") }}

</body>
</html>
@endif