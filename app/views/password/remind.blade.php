<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

    <title>Mwema Advocate - forget password</title>

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


{{HTML::style("assets/css/vendor/bootstrap/bootstrap.min.css") }}
<div class="col-sm-4 col-sm-offset-3" style="margin-top: 200px">
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable" style="padding: 5px">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{ Session::get('error') }}!</strong>
</div>
@endif
@if(Session::has('status'))
<div class="alert alert-success alert-dismissable" style="padding: 5px">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{ Session::get('status') }}!</strong>
</div>
@endif

<form action="{{ action('RemindersController@postRemind') }}" method="POST" class="form-horizontal">

  <div class="form-group">
     Email Address<br>
    <input type="email" name="email" class="form-control transparent-input" placeholder="Email" required />
  </div>
  <div class="form-group">
      <span class="help-block">Check your email after submission</span>
    <input type="submit" value="Send Reminder" class="btn btn-primary btn-sm">
      <a href="{{ url('/') }}" class="pull-right">Login</a>
  </div>
</form>
</div>
    </div>



<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
{{ HTML::script("js/jquery.js") }}
{{ HTML::script("bs3/js/bootstrap.min.js") }}

</body>
</html>