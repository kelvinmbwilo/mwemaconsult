<div class="row">
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">
            Registered Companies
            <button class="btn btn-primary btn-xs pull-right add" id="add"><i class="fa fa-plus"></i> add</button>
        </div>
    </div>
<div class="bootstrap-admin-panel-content">
   @if(count(Company::all()) == 0)
    <h3>There are no Registered Companies</h3>
    @else
    <table class="table table-striped table-bordered" id="example2">
    <thead>
    <tr>
        <th> # </th>
        <th> Name </th>
        <th> Address </th>
        <th> Region </th>
        <th> Email </th>
        <th> Phone </th>
        <th> Fax </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; ?>
    @foreach(Company::all() as $us)
    <tr>
        <td>{{ $i++ }}</td>
        <td class="name" style="text-transform: capitalize">{{ $us->name }}</td>
        <td>{{ $us->address }}</td>
        <td>{{ $us->getRegion->region }}</td>
        <td>{{ $us->email }}</td>
        <td>{{ $us->tel}}</td>
        <td>{{ $us->fax}}</td>
        <td id="{{ $us->id }}">
            <a href="#edit" title="edit Company Details" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
            <div class="dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-user text-primary"></i> Users
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" id="{{ $us->id }}"><a role="menuitem" tabindex="-1" href="#" class="adduser"><i class="fa fa-plus"></i> Add User</a></li>
                    <li role="presentation" id="{{ $us->id }}"><a role="menuitem" tabindex="-1" href="#" class="listuser"><i class="fa fa-list"></i> View Users</a></li>
                </ul>
            </div>
            <a href="#b" title="delete Company" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>
        </td>
    </tr>
    @endforeach

    </tbody>
    </table>

    @endif
</div>
</div>
</div>


<!--script to process the list of users-->
<script>
    /* Table initialisation */
    $(document).ready(function() {
        $('#example2').dataTable({
            "fnDrawCallback": function( oSettings ) {
                //editing a room
                $(".edituser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h2 class="modal-title" id="myModalLabel">Update Company  Information</h2>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';
                    modal+= ' </div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                    $(".modal-body").load("<?php echo url("company/edit") ?>/"+id1);
                    $("#myModal").on('hidden.bs.modal',function(){
                        $("#myModal").remove();
                    })
                })

                    //adding company user
                $(".adduser").click(function(){
                    var name = $(this).parent().parent().parent().parent().find("td.name").text();
                    var id1 = $(this).parent().attr('id');
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h2 class="modal-title" id="myModalLabel">New User For '+name+'</h2>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';
                    modal+= ' </div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                    $(".modal-body").load("<?php echo url("company/user/add") ?>/"+id1);
                    $("#myModal").on('hidden.bs.modal',function(){
                        $("#myModal").remove();
                    })

                })

                $(".listuser").click(function(){
                    var name = $(this).parent().parent().parent().parent().find("td.name").text();
                    var id1 = $(this).parent().attr('id');
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog" style="width:80%;margin-right: 10% ;margin-left: 10%">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h2 class="modal-title" id="myModalLabel">Company Users</h2>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';
                    modal+= ' </div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                    $(".modal-body").load("<?php echo url("company/user/list") ?>/"+id1);
                    $("#myModal").on('hidden.bs.modal',function(){
                        $("#myModal").remove();
                    })

                })

                $(".deleteuser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteuser").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteuser").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url('company/delete') ?>/"+id1,function(data){
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });//endof deleting category
            }
        });

        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");

        //managing the add button
        $(".add").click(function(){
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<h2 class="modal-title" id="myModalLabel">Company Registration</h2>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("company/add/") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        })

    } );
</script>
