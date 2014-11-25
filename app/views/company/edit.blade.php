<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url("company/edit/{$company->id}"),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                Company Name <br>  {{ Form::text('name',$company->name,array('class'=>'form-control','placeholder'=>'Company Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Email <br> {{ Form::email('email',$company->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
            </div>

        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Tel <br> {{ Form::text('phone',$company->tel,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Fax <br> {{ Form::text('fax',$company->fax,array('class'=>'form-control','placeholder'=>'Fax')) }}
            </div>
        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Address<br>{{ Form::text('address',$company->address,array('class'=>'form-control','placeholder'=>'Address','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Country<br>{{ Form::select('country',Country::all()->lists('name','country_id'),$company->region,array('class'=>'form-control','required'=>'requiered')) }}
            </div>
        </div>
        <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
            $("#listuser").load("<?php echo url("company/list") ?>")
        }
    });
</script>
