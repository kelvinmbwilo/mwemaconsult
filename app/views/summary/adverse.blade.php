@include('order.summary')
<?php
if($screen->adversemedia->namescore == 1){
    $color = "#91CF4F";
}elseif($screen->adversemedia->namescore == 2){
    $color = "#FFBF00";
}elseif($screen->adversemedia->namescore == 3){
    $color = "#red";
}else{
    $color = "#gray";
}

if($screen->adversemedia->id_score == 1){
    $color1 = "#91CF4F";
}elseif($screen->adversemedia->id_score == 2){
    $color1 = "#FFBF00";
}elseif($screen->adversemedia->id_score == 3){
    $color1 = "#red";
}else{
    $color1 = "#gray";
}


?>
<div class="row">

<div class="col-md-12">
<h4>Report Details</h4>
<div class="col-sm-10" style="padding: 0px"><h4>Background Checks Included Within This Report:</h4></div>
<div class="col-sm-2" style="padding: 0px">Status:</div>
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Adverse Media Check</b></div>
<div class="col-sm-2" style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px" ></div>
</div>
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->adversemedia->comments }}
</div>
</div>
  <div class="col-md-12">
        <h3>Adverse Media Check</h3><hr>
    <h4>Names Checked</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Search Team(s) Entered</th>
            <th>Date of Search</th>
            <th>Total Matches on searche Term</th>
            <th><span class="col-sm-3">
              <label for="matchonly">Matches Only</label>
            </span></th>
        </tr>
        <tr>
            <td>{{ $screen->adversemedia->searchteam }}</td>
            <td>{{ $screen->adversemedia->	datesearch }}</td>
            <td>{{ $screen->adversemedia->totalmatches }}</td>
            <td>{{ $screen->adversemedia->matchesonly }}</td>
        </tr>
    </table>

    <h4>Details of Matches</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Name matched on </th>
            <th>Age /DOB?</th>
            <th>Extract</th>
        </tr>
         @foreach($screen->adversemedia->matches as $matc)
        <tr>
            <td>{{ $matc->namematchedon }}</td>
            <td>{{ $matc->age }}</td>
            <td>{{ $matc->Extract }}</td>
        </tr>
         @endforeach
    </table>
</div>
    </div>