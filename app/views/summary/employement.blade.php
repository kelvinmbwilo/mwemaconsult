@include('order.summary')
<style>
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
<div class="col-sm-10" style="padding: 0px"><h4>Background Checks Included Within This Report:</h4></div>
<div class="col-sm-2" style="padding: 0px"><h4>Status:</h4></div>
@foreach($screen->employeehistory->historyreference as $hst)
  <?php
if($screen->employeehistory->historyscore == 1){
    $color = "#91CF4F";
}elseif($screen->employeehistory->historyscore == 2){
    $color = "#FFBF00";
}elseif($screen->employeehistory->historyscore == 3){
    $color = "#red";
}else{
    $color = "#gray";
}

?>
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>{{$hst->organisation}}</b></div>
<div class="col-sm-2" style="padding: 0px; background-color:{{$color}}"></div>

</div>
@endforeach
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->employeehistory->comments }}
</div>
</div>
    <div class="col-md-12">
        <h3><span class="text-info">Employment history  references included Within this Report</span></h3>
        <hr>
    
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Organisation</th>
            <th>Reference Method</th>
            <th>Date Produced</th>
            <th>Image Attached</th>
        </tr>
        @foreach($screen->employeehistory->historyreference as $hst)
        <tr>
            <td>{{ $hst->organisation}}</td>
            <td>{{ $hst->referencemethod }}</td>
            <td>{{ $hst->dateproduced }}</td>
            <td>{{ $hst->imageattached }}</td>
        </tr>
        @endforeach
    </table>

      <h4><span class="text-info">Job Role Confirmation</span></h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th width="302">Organisation</th>
            <th colspan="2">Position Held</th>
      </tr>
         @foreach($screen->employeehistory->historyjobs as $hstj)
        <tr>
            <td rowspan="2">{{ $hstj->oganisation}}</td>
            <td width="170">Candidate</td>
            <td width="167">Reference</td>
        </tr>
        <tr>
          <td>{{ $hstj->cpositionheld }}</td>
          <td width="167">{{ $hstj->rposition }}</td>
        </tr>
          @endforeach
    </table>
    <h4><span class="text-info">Confirmation of Employement Date</span></h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th width="302">Organisation</th>
            <th width="302" colspan="2">Employement Start Date</th>
            <th width="302" colspan="2"><span class="col-sm-4">
              <label for="organisation[]">Employement End Date</label>
            </span></th>
      </tr>
         @foreach($screen->employeehistory->historydates as $hstd)
        <tr>
          <td>{{ $hstd->oganisation}}</td>
          <td>{{ $hstd->candidate_sdate}}</td>
          <td>{{ $hstd->referee_sdate}}</td>
          <td>{{ $hstd->candidate_edate}}</td>
          <td>{{ $hstd->referee_edate}}</td>
        </tr>
        
          @endforeach
    </table>
</div>
</div>