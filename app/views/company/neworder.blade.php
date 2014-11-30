@extends("layout.master")

@section('heading')
<h2>
    Place New Order
</h2>
@stop

@section('contents')
{{ HTML::style("css/jquery.steps.css") }}
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
            <section style="padding-top: 1%">
                <form id="basics">
                <span class="help-block"> <span style="color: red">*</span> Required Fields</span>
                    <div class="form-group">
                        <div class="col-md-6">
                            First Name<span style="color: red">*</span> <input type="text" name="firstname" class="form-control" placeholder="First Name" required="required">
                        </div>
                        <div class="col-md-6">
                            Middle Name<input type="text" name="middlename" class="form-control" placeholder="Middle Name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <br>Sir Name<span style="color: red">*</span><input type="text" name="lastname" class="form-control" placeholder="Sir Name" required="required">
                        </div>
                        <div class="col-md-6">
                            <br>Date Of Birth<span style="color: red">*</span><br><input name="dob" class="form-control form-control-inline input-medium dates" required="required" placeholder="YYYY"  size="16" type="text" value="" />
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <br>Address<span style="color: red">*</span><input type="text" name="address" class="form-control" placeholder="Address" required="required">
                        </div>
                        <div class="col-md-6">
                            <br>Gender<span style="color: red">*</span><select name="gender" class="form-control">
                                <option value="Male"><i class="fa fa-male"></i> Male</option>
                                <option value="Female"><i class="fa fa-female"></i> Female</option>
                            </select>
                    </div>
                </div>
                </form>
            </section>

            <h2><i class="fa fa-search"></i> Screening Types</h2>
            <section class="checkboxes" style="padding-top: 1%">
                @foreach(Package::all() as $package)

                <div class="form-group col-sm-6">
                    <h3><label><input type="checkbox" required="required" value="{{ $package->id }}" name="creteria[]" class="pack{{ $package->id }}"> {{ $package->name }}</label></h3>
                <p><small class="">{{ $package->description }} </small></p>
                    @foreach($package->criteria as $criteria)
                    <label for="{{$criteria->id}}" class="col-lg-8">{{ $criteria->name }}</label>
                    <div  class="icons col-lg-4" name="{{ $criteria->name }}">
<!--                        <input class="pack{{ $package->id }} service" id="{{ $criteria->id }}" value="{{ $criteria->id }}" type="checkbox" name="creteria[]">-->
                    </div>
                    @endforeach
                </div>
                @endforeach
            </section>

            <h2><i class="fa fa-briefcase"></i> Required Documents</h2>
            <section style="padding-top: 1%">
                <h3>Please Send us a copy of the following documents</h3>
                <ol>
                    <li>Applicant Signing of Consent form</li>
                    <li>Proof of identity and address</li>
                    <li>Details of education and employment</li>
                    <li>Professional Certificates</li>
                </ol>
                <span style="color: red">*</span><small style="font-size: large">collect all documents in one file/zip it and upload it here</small><br>

                 <input type="file" name="docs" required="required">
            </section>

            <h2><i class="fa fa-list-alt"></i> Summary</h2>
            <section style="padding-top: 0.5%">
                <div id="output"></div>
                <div class="summary"></div>

            </section>
        </div>
        </form>
    </div>
</section>
{{ HTML::script("js/jquery-steps/jquery.steps.js") }}
{{ HTML::script("js/jquery.validate.min.js") }}
<!--{{ HTML::script("validation-master/jquery-validate.bootstrap-tooltip.min.js") }}-->
{{ HTML::script("js/bootstrap-datepicker/js/bootstrap-datepicker.js") }}
{{ HTML::script("js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js") }}
{{ HTML::script("js/bootstrap-daterangepicker/moment.min.js") }}
{{ HTML::script("js/bootstrap-colorpicker/js/bootstrap-colorpicker.js") }}
{{ HTML::script("js/bootstrap-timepicker/js/bootstrap-timepicker.js") }}
<script>
    $(function ()
    {

        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18)
                {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {

                }
                $("#fileUploader").validate().settings.ignore = ":disabled,:hidden";
                return $("#fileUploader").valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                if(currentIndex === 2){

                }
                if(currentIndex === 1){

                }
                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 3)
                {
                    var html = "<h4>Summary</h4>";
                    html += "<table class='table table-bordered table-responsive'> ";
                    html += "<tr> ";
                    html += "<th>Candidate Full Name</th><td>"+$('input[name=firstname]').val()+" "+$('input[name=middlename]').val()+" "+$('input[name=lastname]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<th>Date of Birth</th><td>"+$('input[name=dob]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<th>Address</th><td>"+$('input[name=address]').val()+"</td> ";
                    html += "</tr> ";
                    html += "<tr> ";
                    html += "<td>Services Selected</td><td colspan='2'>"+$('.checkboxes input:checked').parent().text()+"</td> ";
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
                    var ref= $("#output").html();
                    var html = "<h2>Your order with reference number "+ref+" has been placed successful</h2>";
                    html += "<h4>You will receive an email confirmation soon and confirmation  from Mwema Advocate within a day</h4>";
                    html += "<a href='<?php echo url('order/new') ?>' class='btn btn-primary btn-lg'>Place Another Order</a> "
                    $(".panel-body").html(html);
                }
            }
        });

        $(".dates").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:<?php echo date("Y") ?>",
            dateFormat:"yy-mm-dd"
        });
        //check boxes
        $("h3 input[type=checkbox]").each(function(){
            $(this).change(function(){
                var clas = $(this).attr('class');
                if(this.checked){
                    $(".icons input."+clas).attr("checked",true);
                }else{
                    $(".icons input."+clas).attr("checked",false);
                }
            });
        });
    });


</script>
@stop