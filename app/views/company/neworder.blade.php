@extends("layout.master")

@section('heading')
<h2>
    Place New Order
</h2>
@stop

@section('contents')
{{ HTML::style("css/jquery.steps.css%3F1.css") }}
{{ HTML::style("js/bootstrap-datepicker/css/datepicker.css") }}
{{ HTML::style("js/bootstrap-datepicker/css/datepicker.css") }}
{{ HTML::style("js/bootstrap-timepicker/css/timepicker.css") }}
{{ HTML::style("js/bootstrap-colorpicker/css/colorpicker.css") }}
{{ HTML::style("js/bootstrap-daterangepicker/daterangepicker-bs3.css") }}
{{ HTML::style("js/bootstrap-datetimepicker/css/datetimepicker.css") }}

<section class="panel">
    <header class="panel-heading">
          Place a New Order
    </header>
    <div class="panel-body">
      <form  id="fileUploader" action='{{ url("order/new/".Auth::user()->company_id) }}' method="POST" enctype="multipart/form-data">
        <div id="wizard" class="col-sm-10">
            <h2><i class="fa fa-user"></i> Candidate Details</h2>
            <section>
                    <div class="form-group">
                        <div class="col-md-6">
                            First Name<input type="text" name="firstname" class="form-control" placeholder="First Name" required="required">
                        </div>
                        <div class="col-md-6">
                            Middle Name<input type="text" name="middlename" class="form-control" placeholder="Middle Name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <br>Sir Name<input type="text" name="lastname" class="form-control" placeholder="Sir Name" required="required">
                        </div>
                        <div class="col-md-6">
                            <br>Date Of Birth<br><input name="dob" class="form-control form-control-inline input-medium default-date-picker" placeholder="YYYY"  size="16" type="text" value="" />
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <br>Address<input type="text" name="address" class="form-control" placeholder="Address" required="required">
                        </div>
                        <div class="col-md-6">
                            <br>Gender<select name="gender" class="form-control">
                                <option value="Male"><i class="fa fa-male"></i> Male</option>
                                <option value="Female"><i class="fa fa-female"></i> Female</option>
                            </select>
                    </div>
                </div>

            </section>

            <h2><i class="fa fa-search"></i> Screening Types</h2>
            <section class="checkboxes">
                @foreach(Package::all() as $package)

                <div class="form-group col-sm-6">
                    <h3>{{ $package->name }}</h3>
                <p><small class="">{{ $package->description }} </small></p>
                    @foreach($package->criteria as $criteria)
                    <label for="{{$criteria->id}}" class="col-lg-8">{{ $criteria->name }}</label>
                    <div class="col-lg-4" name="{{ $criteria->name }}">
                        <input checked class="service" id="{{ $criteria->id }}" value="{{ $criteria->id }}" type="checkbox" name="creteria[]">
                    </div>
                    @endforeach
                </div>
                @endforeach
            </section>

            <h2><i class="fa fa-briefcase"></i> Required Documents</h2>
            <section>
                <h3>Please Send us a copy of the following documents</h3>
                <ol>
                    <li>Applicant Signing of Consent form</li>
                    <li>Proof of identity and address</li>
                    <li>Details of education and employment</li>
                    <li>Professional Certificates</li>
                </ol>
                <small style="font-size: large">collect all documents in one file/zip it and upload it here</small>

                <input type="file" name="docs" required="required">
            </section>

            <h2><i class="fa fa-list-alt"></i> Summary</h2>
            <section>
                <div id="output"></div>
                <div class="summary"></div>

            </section>
        </div>
        </form>
    </div>
</section>
{{ HTML::script("js/jquery-steps/jquery.steps.js") }}
{{ HTML::script("js/bootstrap-datepicker/js/bootstrap-datepicker.js") }}
{{ HTML::script("js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js") }}
{{ HTML::script("js/bootstrap-daterangepicker/moment.min.js") }}
{{ HTML::script("js/bootstrap-colorpicker/js/bootstrap-colorpicker.js") }}
{{ HTML::script("js/bootstrap-timepicker/js/bootstrap-timepicker.js") }}
<script>
    $(function ()
    {
        $('.default-date-picker').datepicker({
            format: 'mm-dd-yyyy'
        });
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                if(currentIndex === 2){
                  if($( "input.service:checked").length === 0){
                     alert("please select at least one service")
                  }


                }
                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 3)
                {
                    var html = "<h4>Summary</h4>";
                    html += "<table class='table table-bordered table-responsive'> ";
                    html += "<tr> ";
                    html += "<th>Candidate Full Name</th><td>"+$('input[name=firsname]').val()+" "+$('input[name=middlename]').val()+" "+$('input[name=lastname]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<th>Date of Birth</th><td>"+$('input[name=dob]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<th>Address</th><td>"+$('input[name=address]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<td>Services Selected</td><td colspan='2'>"+$('.checkboxes input:checked').length+"</td> ";
                    html += "</tr> ";
                    html += "</table> ";
                    $(".summary").html(html);
                }

            },
            onFinished: function (event, currentIndex)
            {

                    $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Uploading file and saving changes, please wait...</span><h3>");
                    $('#fileUploader').ajaxSubmit({
                        target: '#output',
                        success:  afterSuccess
                    });



                function afterSuccess(){
                    var html = "<h2>Your order has been placed successful</h2>";
                    html += "<h4>You will receive an email confirmation soon and confirmation  from Mwema Advocate within a day</h4>";
                    html += "<a href='<?php echo url('order/new') ?>' class='btn btn-primary btn-lg'>Place Another Order</a> "
                    $(".panel-body").html(html);
                }
            }
        });

    });


</script>
@stop