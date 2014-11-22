<?php
$region = array();
$district = array();
$role = array("admin"=>"admin","data"=>"Data Manager");

?>
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>route('adduser1'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                First Name <br>  {{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Last Name <br> {{ Form::text('lastname','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
            </div>

        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Username <br> {{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Email <br> {{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
            </div>
        </div>

        <div class='form-group'>

            <div class='col-sm-6'>
                Phone Number<br>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Company <br>{{ Form::select('company',Array("{$company->id}"=>"{$company->name}"),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>

        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Password<br>{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Re-Password <br> {{ Form::password('repassword',array('class'=>'form-control','placeholder'=>'Re-Password','required'=>'required')) }}
            </div>
        </div>
        <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add User',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
<script>
    $(document).ready(function (){
        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });


        function afterSuccess(){
            setTimeout(function() {
                $("#myModal").modal("hide");
            }, 3000);
        }
    });
</script>
