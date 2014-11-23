@extends("layout.master")

@section('heading')
<h2>
    Companies
    <small>Manage Companies</small>
</h2>
@stop

@section('contents')
    <div class="col-sm-12" id="listuser">
        @include('order.list')
    </div>
<!--dynamic table initialization -->
{{ HTML::script("js/dynamic_table_init.js") }}
@stop