@include('order.summary')

<div class="row">

<div class="col-md-12">
<h4>Report Details</h4>
<div class="col-sm-10" style="padding: 0px"><h4>Background Checks Included Within This Report:</h4></div>
<div class="col-sm-2" style="padding: 0px"><h4>Status:</h4></div>

  <?php
if($screen->criminal->namescore== 1){
    $color = "#91CF4F";
}elseif($screen->criminal->namescore == 2){
    $color = "#FFBF00";
}elseif($screen->criminal->namescore== 3){
    $color = "#red";
}else{
    $color = "#gray";	
}

?>
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Criminal Check</b></div>
    <div class="col-sm-2" style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px" ></div>

</div>

<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->criminal->comments }}
</div>
</div>
    
    </div>
  </div>
   
</div>
</div>