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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!--dynamic table-->
    {{ HTML::style("js/advanced-datatable/css/demo_page.css") }}
    {{ HTML::style("js/advanced-datatable/css/demo_table.css") }}
    {{ HTML::style("js/data-tables/DT_bootstrap.css") }}
    <link rel="stylesheet" href="{{ asset('jqueryui/css/cupertino/jquery-ui-1.10.4.custom.min.css') }}">
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
        <img src ="{{ asset("images/logo1.png") }}" style='height:85px;width:290px'>
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
        @if(Auth::user()->role != 'company')
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#d" title="pending orders">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">{{ count(Order::where('status','pending')->get()) }}</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                @foreach(Order::where('status','pending')->get() as $order)
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="{{ url('process/order/confirm') }}"> {{ $order->employee->firstname }} {{ $order->employee->lastname }} from {{ $order->company->name }}</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
        @endif
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
                    <a href="{{ url('company/'.Auth::user()->company_id.'/dashboard') }}">
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
                    <a href="{{ url('company/order/'.Auth::user()->company_id) }}">
                        <i class="fa fa-th-list"></i>
                        <span>View Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('company/user/'.Auth::user()->company_id) }}">
                        <i class="fa fa-user"></i>
                        <span>Company Users</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>References</span>
                    </a>
                    <ul class="sub">
<!--                        <li><a href="{{ asset('Pre-employment_background_checklist.pdf') }}">Pre Employment Check list</a></li>-->
                        <li><a href="{{ asset('user_account.pdf') }}">User Account Information</a></li>
                        <li><a href="{{ asset('Background_check_authorization.pdf') }}">Consent Form</a></li>
                    </ul>
                </li>
                @else
                <li>
                    <a href="{{ url('home') }}">
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
                        <li><a href="{{ url('process/order') }}">
                                <i class="fa fa-check-circle"></i> Confirmed <span class="badge">{{ count(Order::where('status','In Progress')->get()) }}</span> </a></li>
                        <li><a href="{{ url('process/order/confirm') }}">
                                <i class="fa fa-question-circle"></i> Unconfirmed <span class="badge">{{ count(Order::where('status','pending')->get()) }}</span></a></li>
                        <li><a href="{{ url('order/published') }}">
                                <i class="fa fa-bookmark"></i> Published <span class="badge">{{ count(Order::where('status','Complete')->get()) }}</span></a></li>
                         <li><a href="{{ url('order/declined') }}">
                                <i class="fa fa-times-circle"></i> Declined <span class="badge">{{ count(Order::where('status','Declined')->get()) }}</span></a></li>
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
<script src="{{ asset('jqueryui/js/jquery-ui-1.10.4.custom.js') }}"></script>
{{ HTML::script("js/jquery.dcjqaccordion.2.7.js") }}
{{ HTML::script("js/jquery.scrollTo.min.js") }}
{{ HTML::script("js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js") }}
{{ HTML::script("js/jquery.nicescroll.js") }}
<!--dynamic table-->
{{ HTML::script("js/advanced-datatable/js/jquery.dataTables.js") }}
{{ HTML::script("js/data-tables/DT_bootstrap.js") }}

<script type="text/javascript" src="{{ asset('Highcharts/js/highcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('Highcharts/js/modules/exporting.js') }}"></script>
<script type="text/javascript" src="{{ asset('Highcharts/js/themes/sand-signika.js') }}"></script>
{{ HTML::script("js/scripts.js") }}


</body>
</html>
@endif