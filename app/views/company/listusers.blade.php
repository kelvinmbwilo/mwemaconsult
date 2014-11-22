<?php
$users=array();
if(Auth::user()->role == "admin"){
    $users = User::where('company_id',$company->id)->get();
}
?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
                System Users From {{ $company->name }}

            </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            @if($users->count() == 0)
            <h3>There are no users for {{ $company->name }}</h3>
            @else
            <table class="table table-striped table-bordered" id="example2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Role </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($users as $us)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td style="text-transform: capitalize">{{ $us->firstname }}  {{ $us->lastname }}</td>
                    <td>{{ $us->username }}</td>
                    <td>{{ $us->email }}</td>
                    <td>{{ $us->phone }}</td>
                    <td>{{ $us->role }}</td>
                    <td id="{{ $us->id }}">

                        <a href="#log" title="View Staff log" class="userlog"><i class="fa fa-list text-success"></i> log</a>&nbsp;&nbsp;&nbsp;
                        @if(Auth::user()->id != $us->id)
                        <a href="#edit" title="edit User" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                        <a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>
                        @endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>

            @endif
        </div>
    </div>
</div>

<!--script for this page only-->
{{ HTML::script("js/table-editable.js") }}