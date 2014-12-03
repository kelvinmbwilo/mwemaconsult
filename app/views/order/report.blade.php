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
            <tr><th style="width: 30%">Candidate Full Name:</th><td>{{ $order->employee->firstname }} {{ $order->employee->middlename }} {{ $order->employee->lastname }}</td></tr>
            <tr><th>Date of Birth:</th><td>{{  $order->employee->dob }}</td></tr>
            <tr><th>Address:</th><td>{{  $order->employee->address}}</td></tr>
        </table>

        <h4>Report Details</h4>
        <table class="table table-bordered table-striped">
            <tr><th style="width: 30%">Report Prepared For</th><td colspan="3">{{ $order->employee->company->name }}</td></tr>
            <tr><th>MWEMA Reference Number</th><td colspan="3">{{ $order->result_id }}</td></tr>
            <tr><th>Date Submitted</th><td>{{ date('j M Y',strtotime($order->created_at)) }}</td>
                <th>Date Completed</th><td>{{ date('j M Y',strtotime($order->completed_date )) }}
                    </td></tr>
        </table>

    </div></div>
<div class="row">
<div class="col-md-12">
    <h4>Report Details</h4>
    <table style="width: 100%">
        <tr>
            <td style="width: 85%"><h4>Background Checks Included Within This Report:</h4></td>
            <td><h4>Status:</h4></td>
        </tr>
        @foreach($order->screening as $est)
        <?php
        if($est->mark == 1){
            $color = "#91CF4F";
        }elseif($est->mark == 2){
            $color = "#FFBF00";
        }elseif($est->mark == 3){
            $color = "#red";
        }else{
            $color = "#gray";
        }

        ?>
        <tr style="border: 1px #000000">
            <td style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>{{ $est->screening->name }}</b></td>
            <td style="padding: 5px; background-color:<?php echo $color ?> ;height: 30px"></td>
        </tr>

        @endforeach
    </table>
</div>
</div>