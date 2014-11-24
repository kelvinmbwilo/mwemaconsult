<div class="adv-table">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
<thead>
<tr>
    <th>Ref#</th>
    <th>Full Name</th>
    <th class="hidden-phone">Birth Date</th>
    <th class="hidden-phone">Address</th>
    <th class="hidden-phone">Placement<br> Date</th>
    <th class="hidden-phone">Delivery<br> Date</th>
    <th class="hidden-phone">Address</th>
    <th class="hidden-phone">Status</th>
</tr>
</thead>
<tbody>
@foreach(Order::where('company_id',Auth::user()->company_id)->get() as $employee)
<tr class="gradeX">
    <td>{{ $employee->employee->id }}</td>
    <td style="text-transform: capitalize">{{  $employee->employee->firstname }} {{  $employee->employee->middlename }} {{  $employee->employee->lastname }}</td>
    <td class="hidden-phone">{{  $employee->employee->dob }}</td>
    <td class="center hidden-phone">{{  $employee->employee->address }}</td>
    <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)) }}</td>
    <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)+(5*24*60*60)) }}</td>
    <td class="center hidden-phone">{{  $employee->employee->address }}</td>
    @if($employee->status == 'pending')
    <td class="center hidden-phone" style="background-color: ">{{  $employee->status }}</td>
    @elseif($employee->status == 'Complete')
    <td class="center hidden-phone" style="background-color: lawngreen">{{  $employee->status }}</td>
    @elseif($employee->status == 'In Progress')
    <td class="center hidden-phone" style="background-color: yellow">{{  $employee->status }}</td>
    @elseif($employee->status == 'Declined')
    <td class="center hidden-phone" style="background-color: firebrick">{{  $employee->status }}</td>
    @else
    <td class="center hidden-phone">{{  $employee->status }}</td>
    @endif
</tr>
@endforeach
</tbody>
</table>

</div>
