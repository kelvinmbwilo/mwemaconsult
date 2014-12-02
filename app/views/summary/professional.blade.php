@include('order.summary')

<div class="row">

<div class="col-md-12">
<h4>Report Details</h4>
<div class="col-sm-10" style="padding: 0px"><h4>Background Checks Included Within This Report:</h4></div>
<div class="col-sm-2" style="padding: 0px"><h4>Status:</h4></div>
    {{$screen->professional->establishment}}
@foreach($screen->professional->establishment as $est)
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
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>{{$est->establish_name}}</b></div>
<div class="col-sm-2" style="padding: 0px; background-color:{{$color}}"></div>

</div>
@endforeach
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->professional->Comments }}
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
            <th>Image Attached</th>
        </tr>
        @foreach($screen->professional->establishment as $est)
        <tr>
            <td>{{ $est->establish_name}}</td>
            <td>{{ $est->referencemethod }}</td>
            <td>{{ $est->dateproduced }}</td>
            <td>{{ $est->imageattached }}</td>
        </tr>
        @endforeach
    </table>
<div class="row">
    <div class="col-sm-12">
      @foreach($screen->professional->qualification as $qf)
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th width="302">Qualification</th>
            <th width="337" colspan="2"></th>
      </tr>
        <tr>
          <th>Did candidate study at this establishment?</th>
          <th colspan="2">{{ $qf->checkstudy }}</th>
        </tr>
        <tr>
          <th colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="31%">Candidate</td>
              <td width="36%">Referee</td>
            </tr>
            <tr>
              <td>{{ $qf->candidate_adate }}</td>
              <td>{{ $qf->reference_adate }}</td>
            </tr>
            <tr>
              <td>{{ $qf->candidate_course }}</td>
              <td>{{ $qf->reference_course }}</td>
            </tr>
            <tr>
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