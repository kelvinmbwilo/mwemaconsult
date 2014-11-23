@extends("layout.master")

@section('heading')

@stop

@section('contents')
<div class="col-sm-12">
    @include('admin.list')
</div>
<!--dynamic table initialization -->
{{ HTML::script("js/processorder.js") }}
@stop