<div class="row">
<!--    logo-->
    <div class="col-sm-12">
        <table style="width: 100%">
            <tr>
                <td style="width: 80%"></td>
                <td><img src="{{ asset('images/logo1.png') }}" class="img-responsive img-rounded pull-right" style="height: 60px"></td>
            </tr>
        </table>

    </div>

<style>
    .summarytable tr{
        padding-top: 5px;
        padding-bottom: 5px;
    }.summarytable th{
        padding-top: 5px;
        padding-bottom: 5px;
    }.summarytable td{
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
</div>
<div class="row">
<div class="col-md-12">
    <h4>Candidate Details</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr><th style="width: 30%">Candidate Full Name:</th><td>{{ $screen->employee->firstname }} {{ $screen->employee->middlename }} {{ $screen->employee->lastname }}</td></tr>
        <tr><th>Date of Birth:</th><td>{{  $screen->employee->dob }}</td></tr>
        <tr><th>Address:</th><td>{{  $screen->employee->address}}</td></tr>
    </table>

    <h4>Report Details</h4>
    <table class="table table-bordered table-striped">
        <tr><th style="width: 30%">Report Prepared For</th><td colspan="3">{{ $screen->employee->company->name }}</td></tr>
        <tr><th>MWEMA Reference Number</th><td colspan="3">{{ $screen->order->result_id }}</td></tr>
        <tr><th>Date Submitted</th><td>{{ date('j M Y',strtotime($screen->order->created_at)) }}</td>
            <th>Date Completed</th><td>@if($screen->complete == 100) {{ date('j M Y',strtotime($screen->updated_at )) }}
                @else
                <span class="text-warning">Not Complete({{$screen->complete}}%)</span>
                @endif</td></tr>
    </table>

</div></div>
