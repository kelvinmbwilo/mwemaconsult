<div class="row">
    <div class="box-header">
        <h3 class="box-title">Update Your Information </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php
    $valid = "";
    if(Auth::user()->role == "company"){
        $valid = "disabled";
    }

    ?>
    @if(Auth::user()->role == "company")
    <form role="form" id="profileEditor" method="post" action="{{url("user/edit/{$user->id}")}}">
    <div class="box-body">
        <div class="form-group col-sm-12">
            <div class="col-sm-3">First Name</div>
            <div class="col-sm-9"> <input type="text" disabled class="form-control" id="firstname" name="" value="{{ $user->firstname }}" placeholder="First Name"></div>
            <input type="hidden" name="firstname" value="{{ $user->firstname }}">
        </div>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">Last Name</div>
            <div class="col-sm-9"> <input type="text" disabled class="form-control" id="lastname" name="" value="{{ $user->lastname }}" placeholder="Last Name"></div>
            <input type="hidden" name="lastname" value="{{ $user->lastname }}">
        </div>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">User Name</div>
            <div class="col-sm-9"> <input type="text" disabled class="form-control" id="middlename" name="" value="{{ $user->username }}" placeholder="Middle Name"></div>
            <input type="hidden" name="username" value="{{ $user->username }}">
        </div>


        <div class="form-group col-sm-12">
            <div class="col-sm-3">Email Address</div>
            <div class="col-sm-9"> <input type="email" disabled class="form-control" id="email" name="" value="{{ $user->email }}" placeholder="Email Address"></div>
            <input type="hidden" name="email" value="{{ $user->email }}">
        </div>
        <input type="hidden" name="role" value="{{ $user->role_id }}">

        <div class="form-group col-sm-12">
            <div class="col-sm-3">Phone Number</div>
            <div class="col-sm-9"> <input disabled  type="text" class="form-control" id="phone" name="" value="{{ $user->phone }}" placeholder="Phone Number"></div>
            <input type="hidden" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">Password</div>
            <div class="col-sm-9"> <input  type="password" class="form-control" id="password" name="password" value="" ></div>
        </div>

        <div class="form-group col-sm-12">
            <div class="col-sm-3">Re-enter Password</div>
            <div class="col-sm-9"> <input type="password" class="form-control" id="password" name="re_enter_password" value="" placeholder=""></div>
        </div>
    </div><!-- /.box-body -->
    <div id="output"></div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
    </form>


    @else
    <form role="form" id="profileEditor" method="post" action="{{url("user/edit/{$user->id}")}}">
    <div class="box-body">
        <div class="form-group col-sm-12">
            <div class="col-sm-3">First Name</div>
            <div class="col-sm-9"> <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" placeholder="First Name"></div>
        </div>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">Last Name</div>
            <div class="col-sm-9"> <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" placeholder="Last Name"></div>
        </div>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">User Name</div>
            <div class="col-sm-9"> <input type="text" class="form-control" id="middlename" name="username" value="{{ $user->username }}" placeholder="Middle Name"></div>
        </div>


        <div class="form-group col-sm-12">
            <div class="col-sm-3">Email Address</div>
            <div class="col-sm-9"> <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email Address"></div>
        </div>
        <input type="hidden" name="role" value="{{ $user->role_id }}">

        <div class="form-group col-sm-12">
            <div class="col-sm-3">Phone Number</div>
            <div class="col-sm-9"> <input  type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Phone Number"></div>
        </div>
        @if(Auth::user()->role != 'company')
        <div class="form-group col-sm-12">
            <div class="col-sm-3">Password</div>
            <div class="col-sm-9"> <input  type="password" class="form-control" id="password" name="password" value="" ></div>
        </div>

        <div class="form-group col-sm-12">
            <div class="col-sm-3">Re-enter Password</div>
            <div class="col-sm-9"><input type="password" class="form-control" id="password" name="re_enter_password" value="" placeholder=""></div>
        </div>
    </div><!-- /.box-body -->
    <div id="output  col-sm-12"></div>
    <div class="box-footer  col-sm-12">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
    @endif
    </form>

    @endif

</div><script>
    $(document).ready(function (){
        $('#profileEditor').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });

        function afterSuccess(){
            $('#profileEditor').resetForm();
            setTimeout(function() {
                $("#output").html("");
            }, 3000);
            $("#profileInfo").load("<?php echo url("profileInfo") ?>");
            ("#profileEdit").load("<?php echo url("profileEdit") ?>");
        }
    });
</script>
