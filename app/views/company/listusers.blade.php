<?php
$users=array();
if(Auth::user()->role == "admin"){
    $users = User::where('company_id',$company->id)->get();
}if(Auth::user()->role == "company"){
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
                    @if(Auth::user()->role != "company")
                        <th> Role </th>
                    @endif
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
                    @if(Auth::user()->role != "company")
                    <td>{{ $us->role }}</td>
                    @endif
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