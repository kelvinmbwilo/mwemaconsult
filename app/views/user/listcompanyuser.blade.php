@extends("layout.master")

@section('heading')
<h2>
    {{ Company::find(Auth::user()->company_id)->name }} Users
    <small></small>
</h2>
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('company.listusers')
</div>
@stop