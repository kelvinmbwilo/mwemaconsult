@include('order.summary')
<?php
if($screen->compliance->namescore == 1){
    $color = "#91CF4F";
}elseif($screen->compliance->namescore == 2){
    $color = "#FFBF00";
}elseif($screen->compliance->namescore == 3){
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
<div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Sunctions Check</b></div>
<div class="col-sm-2" style="padding: 0px; background-color:<?php echo $color ?> ;height: 25px" ></div>
</div>
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

    {{ $screen->compliance->comments }}
</div>
</div>
  <div class="col-md-12">
        <h3>Sunction Check</h3>
        <hr>
    <h4>Names Checked</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Search Team(s) Entered</th>
            <th>Date of Search</th>
            <th>Total Matches on search Term</th>
            <th><span class="col-sm-3">
              <label for="matchonly">Matches qualified Out
            </span></th>
            <th>Posible Matches on your Candidate</th>
        </tr>
        <tr>
            <td>{{ $screen->compliance->searchteam }}</td>
            <td>{{ $screen->compliance->datesearch }}</td>
            <td>{{ $screen->compliance->totalmatches }}</td>
            <td>{{ $screen->compliance->matchesqualified }}</td>
            <td>{{ $screen->compliance->possiblematches }}</td>
        </tr>
    </table>

    <h4><span class="text-info">Matches Qualified Out</span></h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th width="188">Name matched on </th>
            <th width="162">
              Issuing Entity / Country</th>
            <th width="133">
              Type
            </span></th>
            <th width="83">
              Reson Qualified
            </th>
      </tr>
         @foreach($screen->compliance->getmatches as $matc)
        <tr>
            <td>{{ $matc->namematchedon }}</td>
            <td>{{ $matc->issuingentity }}</td>
            <td>{{ $matc->type }}</td>
            <td>{{ $matc->resonqualified }}</td>
        </tr>
         @endforeach
    </table>

<h4>Posible Matches on Your Candidate</h4>
   <table class="table table-bordered table-striped summarytable">
     <tr>
       <th >Name matched on </th>
       <th>
        Issuing Entity / Country</th>
       <th >
         Type
       </th>
       <th >
         Extract
       </th>
     </tr>
     @foreach($screen->compliance->getposibles as $maps)
  <tr>
    <td>{{ $maps->namematchedon	 }}</td>
    <td>{{ $maps->issuingentity }}</td>
    <td>{{ $maps->type }}</td>
    <td>{{ $maps->extract }}</td>
  </tr>
     @endforeach
   </table>
</div>
</div>