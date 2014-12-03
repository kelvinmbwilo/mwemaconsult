@include('order.summary')
<style xmlns="http://www.w3.org/1999/html">
    .table {
        border-collapse: collapse !important;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd !important;
    }

    .col-sm-2,
    .col-sm-10,
    .col-sm-12,
    .col-md-12{
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;

    }
    table {
        max-width: 100%;
        background-color: transparent;
    }

    th {
        text-align: left;
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
    }

    .table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
        padding: 8px;
        line-height: 1.428571429;
        vertical-align: top;
        border-top: 1px solid #dddddd;
    }

    .table > thead > tr > th {
        vertical-align: bottom;
        border-bottom: 2px solid #dddddd;
    }

    .table > caption + thead > tr:first-child > th,
    .table > colgroup + thead > tr:first-child > th,
    .table > thead:first-child > tr:first-child > th,
    .table > caption + thead > tr:first-child > td,
    .table > colgroup + thead > tr:first-child > td,
    .table > thead:first-child > tr:first-child > td {
        border-top: 0;
    }

    .table > tbody + tbody {
        border-top: 2px solid #dddddd;
    }

    .table .table {
        background-color: #ffffff;
    }

    .table-condensed > thead > tr > th,
    .table-condensed > tbody > tr > th,
    .table-condensed > tfoot > tr > th,
    .table-condensed > thead > tr > td,
    .table-condensed > tbody > tr > td,
    .table-condensed > tfoot > tr > td {
        padding: 5px;
    }

    .table-bordered {
        border: 1px solid #dddddd;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #dddddd;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
    }

    .table-striped > tbody > tr:nth-child(odd) > td,
    .table-striped > tbody > tr:nth-child(odd) > th {
        background-color: #f9f9f9;
    }

    .table-hover > tbody > tr:hover > td,
    .table-hover > tbody > tr:hover > th {
        background-color: #f5f5f5;
    }

    table col[class*="col-"] {
        position: static;
        display: table-column;
        float: none;
    }

    table td[class*="col-"],
    table th[class*="col-"] {
        display: table-cell;
        float: none;
    }

    .table > thead > .active > td,
    .table > tbody > .active > td,
    .table > tfoot > .active > td,
    .table > thead > .active > th,
    .table > tbody > .active > th,
    .table > tfoot > .active > th {
        background-color: #f5f5f5;
    }

    .table-hover > tbody > tr > .active:hover,
    .table-hover > tbody > .active:hover > td,
    .table-hover > tbody > .active:hover > th {
        background-color: #e8e8e8;
    }
    .col-sm-10 {
        width: 82.33333333333334%;
    }


    .col-sm-2 {
        width: 15.666666666666664%;
    }
    .pull-right {
        float: right!important;
    }

</style>
<div class="row">

<div class="col-md-12">
<h4>Report Details</h4>
    <table style="width: 100%">
        <tr>
            <td style="width: 85%"><h4>Background Checks Included Within This Report:</h4></td>
            <td><h4>Status:</h4></td>
        </tr>
@foreach($screen->academic->establishment as $est)
  <?php
if($est->qualiscore == 1){
    $color = "#91CF4F";
}elseif($est->qualiscore == 2){
    $color = "#FFBF00";
}elseif($est->qualiscore == 3){
    $color = "#red";
}else{
    $color = "#gray";
}

?>
    <tr>
        <td style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>{{$est->establish_name}}</b></td>
        <td style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px"></td>
    </tr>

@endforeach
    </table>
    </div>
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->academic->Comments }}
</div>
</div>
    <div class="col-md-12">
        <h3><span class="text-info">Qualification Check included Within this Report</span></h3>
        <hr>
    
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th><span class="col-sm-4">
              <label for="establish_name[]">Establish Name</label>
            </span></th>
            <th>Reference Method</th>
            <th>Date Supplied</th>
        </tr>
        @foreach($screen->academic->establishment as $est)
        <tr>
            <td>{{ $est->establish_name}}</td>
            <td>{{ $est->referencemethod }}</td>
            <td>{{ $est->dateproduced }}</td>
        </tr>
        @endforeach
    </table>
<div class="row">
    <div class="col-sm-12">
      @foreach($screen->academic->establishment as $qf)
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th width="302">Qualification</th>
            <th width="337" colspan="2">{{$qf->establish_name}}</th>
      </tr>
        <tr>
          <th>Did candidate study at this establishment?</th>
          <th colspan="2">{{ $qf->checkstudy }}</th>
        </tr>
        <tr>
          <th colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="33%">&nbsp;</td>
              <td width="31%">Candidate</td>
              <td width="36%">Referee</td>
            </tr>
            <tr>
              <td>Attendence Date</td>
              <td>{{ $qf->candidate_adate }}</td>
              <td>{{ $qf->reference_adate }}</td>
            </tr>
            <tr>
              <td>Name of course(s) studied</td>
              <td>{{ $qf->candidate_course }}</td>
              <td>{{ $qf->reference_course }}</td>
            </tr>
            <tr>
              <td>Qualification and grade awaded</td>
              <td>{{ $qf->candidate_grade }}</td>
              <td>{{ $qf->reference_grade }}</td>
            </tr>
          </table></th>
          </tr>
       
        </table>
    @endforeach
    </div>
    </div>
   
</div>
</div>