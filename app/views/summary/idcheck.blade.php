@include('order.summary')
<?php
if($screen->idcheck->address_score == 1){
    $color = "#91CF4F";
}elseif($screen->idcheck->address_score == 2){
    $color = "#FFBF00";
}elseif($screen->idcheck->address_score == 3){
    $color = "#red";
}else{
    $color = "#gray";
}

if($screen->idcheck->id_score == 1){
    $color1 = "#91CF4F";
}elseif($screen->idcheck->id_score == 2){
    $color1 = "#FFBF00";
}elseif($screen->idcheck->id_score == 3){
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
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Identity Validation</b></div>
<div class="col-sm-2" style="padding: 0px; background-color: <?php echo $color1 ?>;height: 25px" ></div>
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Address Check</b></div>
<div class="col-sm-2" style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px" ></div>
</div>
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->idcheck->description }}
</div>
</div>
    <div class="col-md-12">
        <h3>Identity Check</h3><hr>
    <h4>Identity Validation</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Candidate Identity Validated?</th>
            <th>Confidence Rating<br>
                (Low / Medium / High)</th>
            <th>Alias Names found</th>
            <th>Mortality file match?</th>
        </tr>
        <tr>
            <td>{{ $screen->idcheck->validated }}</td>
            <td>{{ $screen->idcheck->rating }}</td>
            <td>{{ $screen->idcheck->alias }}</td>
            <td>{{ $screen->idcheck->mortality }}</td>
        </tr>
    </table>

        <h4>Address Check</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Does the data suggest the candidate is resident at their current
                address?</th>
            <th>How many pieces of data support the validation?</th>
        </tr>
        <tr>
            <td>{{ $screen->idcheck->currentaddress }}</td>
            <td>{{ $screen->idcheck->datapiece }}</td>
        </tr>
    </table>
</div>
    </div>