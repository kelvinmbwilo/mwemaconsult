@extends("layout.master")

@section("heading")
<h2>
    User Profile
    <small>Manage your profile</small>
</h2>
@stop

@section('contents')
<div class="row">
    <div class="col-md-7" id="profileInfo">
        @include('user.profileInfo')
    </div>
    <div class="col-md-5" id="profileEdit">
        @include('user.profileEdit')
    </div>
</div>

@stop