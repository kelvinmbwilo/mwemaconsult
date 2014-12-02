@include('order.summary')
<?php
$screen1  = $screen->gapanalysis;
if($screen1->gapscore == 1){
    $color = "#91CF4F";
}elseif($screen1->gapscore == 2){
    $color = "#FFBF00";
}elseif($screen1->gapscore == 3){
    $color = "#red";
}else{
    $color = "#gray";
}

?>
<div class="row">

    <div class="col-md-12">
        <h4>Report Details</h4>
        <div class="col-sm-10" style="padding: 0px"><h4>Background Checks Included Within This Report:</h4></div>
        <div class="col-sm-2" style="padding: 0px"><h4>Status:</h4></div>
        <div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Gap Analysis</b></div>
        <div class="col-sm-2" style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px" ></div>
    </div>
    <div class="col-md-12">
        <br>
        <h4>Observations</h4>
        <div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

            {{ $screen1->comments }}
        </div>
    </div>
    <div class="col-md-12">
        <h3>Gap Analysis Check</h3>

        <h4><span class="text-info">Employment Gaps</span></h4>
        <table class="table table-bordered table-striped summarytable">
            <tr>
                <th width="188">Period </th>
                <th width="162">Comments</th>
            </tr>
            @foreach($screen1->history as $matc)
            <tr>
                <td>{{ $matc->period }}</td>
                <td>{{ $matc->comments }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>