@include('order.summary')

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