<div class="row">
<!--    logo-->
    <div class="col-sm-12">
        <img src="{{ asset('images/logo1.png') }}" class="img-responsive img-rounded pull-right">
    </div>


</div>
<div class="row">
<div class="col-md-12">
    <h4>Candidate Details</h4>
    <table class="table table-bordered table-striped">
        <tr><th>Candidate Full Name:</th><td>{{ $screen->employee->firstname }} {{ $screen->employee->middlename }} {{ $screen->employee->lastname }}</td></tr>
        <tr><th>Date of Birth:</th><td>{{  $screen->employee->dob }}</td></tr>
        <tr><th>Address:</th><td>{{  $screen->employee->address}}</td></tr>
    </table>

    <h4>Report Details</h4>
    <table class="table table-bordered table-striped">
        <tr><th>Report Prepared For</th><td colspan="3">{{ $screen->employee->company->name }}</td></tr>
        <tr><th>MWEMA Reference Number</th><td colspan="3">{{ $screen->order->id }}</td></tr>
        <tr><th>Date Submitted</th><td>{{ date('j M Y',strtotime($screen->order->created_at)) }}</td>
            <th>Date Completed</th><td>@if($screen->complete == 100) {{ date('j M Y',strtotime($screen->updated_at )) }}
                @else
                <span class="text-warning">Not Complete({{$screen->complete}}%)</span>
                @endif</td></tr>
    </table>

    <h4>Report Details</h4>
    <div class="col-sm-10" style="padding: 0px">Background Checks Included Within This Report:</div>
    <div class="col-sm-2" style="padding: 0px">Status:</div>
    <div class="col-sm-10" style="padding: 0px; background-color: #F3F3F3;height: 30px">Employment Reference 1: Example Co Ltd</div>
    <div class="col-sm-2" style="padding: 0px; background-color: #FFBF00;height: 30px" ></div>
    <div class="col-sm-10" style="padding: 0px; background-color: #F3F3F3;height: 30px">Employment Reference 2: Imaginary Consulting LLP Co Ltd</div>
    <div class="col-sm-2" style="padding: 0px; background-color:lawngreen ;height: 30px" ></div>

    <h4>Observations</h4>
    <div class="col-sm-12" style="padding: 0px; background-color: #F3F3F3;height: 120px">
        1. The employment end date for reference 2: Imaginary Consulting Ltd was approximately 3 months earlier than claimed by the
        candidate.<br>
        2. The employment start date for reference 3: TZK Global Bank was 5 months later than claimed by the candidate.<br>
        3. These discrepancies in employment dates mean there is a period of 9 months that is not accounted for.<br></div>

</div></div>
