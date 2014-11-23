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
    <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)+(5*24*60*60)) }}</td>
    <td class="center hidden-phone">{{  $employee->status }}</td>
</tr>
@endforeach
</tbody>
</table>

</div>
