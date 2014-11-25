@extends("layout.master")

@section('heading')

@stop

@section('contents')
<div class="adv-table">
    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example2">
        <thead>
        <tr>
            <th>Ref#</th>
            <th>Full Name</th>
            <th>Company</th>
            <th class="hidden-phone">Birth of Date</th>
            <th class="hidden-phone">Address</th>
            <th class="hidden-phone">Placement<br> Date</th>
            <th class="hidden-phone">Delivery<br> Date</th>
            <th class="hidden-phone">Reason</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Order::where('status','declined')->get() as $employee)
        <tr class="gradeX">
            <td>{{ $employee->employee->id }}</td>
            <td style="text-transform: capitalize">{{  $employee->employee->firstname }} {{  $employee->employee->middlename }} {{  $employee->employee->lastname }}</td>
            <td class="hidden-phone">{{  $employee->company->name }}</td>
            <td class="hidden-phone">{{  $employee->employee->dob }}</td>
            <td class="center hidden-phone">{{  $employee->employee->address }}</td>
            <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)) }}</td>
            <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)+(5*24*60*60)) }}</td>
            <td class="center hidden-phone">{{  $employee->completed_date }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function(){
        $('#example2').dataTable({
            "fnDrawCallback": function( oSettings ) {

            }
        });
    })
</script>
@stop