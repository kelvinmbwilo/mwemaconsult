<?php
$region = array();
$district = array();
if($user->role == 'company'){
    $role = array("admin"=>"admin","data"=>"Data Manager");
}else{
    $role = array("admin"=>"admin","data"=>"Data Manager");
}

?>
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url("user/edit/{$user->id}"),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                First Name <br>  {{ Form::text('firstname',$user->firstname,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Last Name <br> {{ Form::text('lastname',$user->lastname,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
            </div>

        </div>
        <div class='form-group'>
        <div class='col-sm-6'>
            User Name<br> {{ Form::text('username',$user->username,array('class'=>'form-control','placeholder'=>'Middle Name')) }}
        </div>
            <div class='col-sm-6'>
                Email <br> {{ Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
            </div>
        </div>

        <div class='form-group'>

            <div class='col-sm-6'>
                Phone Number<br>{{ Form::text('phone',$user->phone,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                @if($user->role == 'company')
                Company <br>{{ Form::select('company',Company::all()->lists('name','id'),$user->company_id,array('class'=>'form-control','required'=>'requiered')) }}
                @else
                Role <br>{{ Form::select('role',$role,$user->role,array('class'=>'form-control','required'=>'requiered')) }}
                @endif
            </div>

        </div>


        <div id="output"></div>
       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
            $("#listuser").load("<?php echo url("user/list") ?>")
        }
    });
</script>


