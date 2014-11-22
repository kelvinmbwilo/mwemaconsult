@extends("layout.master")

@section('heading')
<h2>
    Companies
    <small>Manage Companies</small>
</h2>
@stop

@section('contents')
    <div class="col-sm-12" id="listuser">
        @include('user.list')
    </div>
@stop