<!DOCTYPE html>
@if(Auth::user())
   @if(Auth::user()->role == 'company')
    {{  Redirect::to("company/".Auth::user()->company_id."/dashboard");  }}
   @else
    {{  Redirect::to("home")  }}
  @endif

@else
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

    <title>Mwema Advocate - Login</title>

    <!--Core CSS -->
    {{ HTML::style("bs3/css/bootstrap.min.css") }}
    {{ HTML::style("css/bootstrap-reset.css") }}
    {{ HTML::style("font-awesome/css/font-awesome.css") }}

    <!-- Custom styles for this template -->
    {{ HTML::style("css/style.css") }}
    {{ HTML::style("css/style-responsive.css") }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script("js/html5shiv.js") }}
    {{ HTML::script("js/respond.min.js") }}
    <![endif]-->
</head>

<body class="lock-screen">

<div class="container">
    <form class="form-signin" action="{{ url('login') }}" method="POST">
        <img class="img-rounded img-responsive" src ="{{ asset("refe.png") }}" style='height:95px;width:90%;margin-left:5%'>
        <h2 class="form-signin-heading" style=";margin:0px;padding-top: 15px;padding-bottom: 5px">sign in now</h2>
        <div class="login-wrap">
            @if(isset($error))
            <div class="alert alert-danger alert-dismissable" style="padding: 5px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ $error }}!</strong>
            </div>
            @endif
            <div class="user-login-info">
                <input type="text" name="email" class="form-control" placeholder="User ID" autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="keep" name="keep"> Remember me
                <span class="pull-right">
<!--                    <a href="{{ url('password/remind/') }}" style="color: white"> Forgot Password?</a>-->

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>


        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email1" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
{{ HTML::script("js/jquery.js") }}
{{ HTML::script("bs3/js/bootstrap.min.js") }}

</body>
</html>
@endif
