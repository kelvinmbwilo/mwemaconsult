<?php
function calculateRange($start,$j,$order){
    $package = array();
    if($order->screening){
        foreach($order->screening as $screen){
            if($screen->screening){
                if(in_array($screen->screening->package->id,$package)){

                }else{
                    $package[] = $screen->screening->package->id;
                }
            }
        }
        if(count($package) == 2){
            $j = 15;
        }else{
            if(in_array('1',$package)){
                $j = 5;
            }if(in_array('2',$package)){
                $j = 10;
            }

        }
    }
//    $start = new DateTime($start);
    $date = "";$i = 0;
    for($m = 0; $m<30 ; $m++){
        $nextday = date('Y-m-d',strtotime($start)+(24*60*60));

        $holidays = array('2012-09-07');
        if (in_array(date('Y-m-d',strtotime($nextday)), $holidays)) {

        }elseif (date('D',strtotime($nextday)) == 'Sat' || date('D',strtotime($nextday)) == 'Sun') {

        } else{
            $i++;
        }
        if($i == $j){
            $date = date('j M Y',strtotime($nextday));
        }
        $start = $nextday;
    }
    return $date;

}
?>
<div class="adv-table">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
<thead>
<tr>
    <th>Ref#</th>
    <th>Full Name</th>
    <th class="hidden-phone">Birth of Date</th>
    <th class="hidden-phone">Address</th>
    <th class="hidden-phone">Placement<br> Date</th>
    <th class="hidden-phone">Delivery<br> Date</th>
    <th class="hidden-phone">Status</th>
</tr>
</thead>
<tbody>
@foreach(Order::where('status','In Progress')->get() as $employee)
<tr class="gradeX">
    <td>{{ $employee->employee->id }}</td>
    <td style="text-transform: capitalize">{{  $employee->employee->firstname }} {{  $employee->employee->middlename }} {{  $employee->employee->lastname }}</td>
    <td class="hidden-phone">{{  $employee->employee->dob }}</td>
    <td class="center hidden-phone">{{  $employee->employee->address }}</td>
    <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)) }}</td>
    <td class="center hidden-phone">{{  calculateRange(date('Y-m-d',strtotime($employee->created_at)),5,$employee) }}</td>
    <td class="center hidden-phone">{{  $employee->status }}</td>
</tr>
@endforeach
</tbody>
</table>

</div>
