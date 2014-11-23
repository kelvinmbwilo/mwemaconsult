<div class="adv-table">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
<thead>
<tr>
    <th>Reference Number</th>
    <th>Full Name</th>
    <th class="hidden-phone">Birth of Date</th>
    <th class="hidden-phone">Address</th>
    <th class="hidden-phone">Status</th>
</tr>
</thead>
<tbody>
@foreach(Order::where('company_id',Auth::user()->company_id)->get() as $employee)
<tr class="gradeX">
    <td>{{ $employee->employee->id }}</td>
    <td>{{  $employee->employee->firstname }}</td>
    <td class="hidden-phone">{{  $employee->employee->dob }}</td>
    <td class="center hidden-phone">{{  $employee->employee->address }}</td>
    <td class="center hidden-phone">{{  $employee->status }}</td>
</tr>
@endforeach
</tbody>
</table>

</div>
