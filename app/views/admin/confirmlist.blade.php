@extends("layout.master")

@section('heading')

@stop

@section('contents')
<?php
function calculateRange($start,$j,$order){
    $package = array();
    if($order->screening){
        foreach($order->screening as $screen){
            if($screen->screening){
                if(in_array($screen->screening->package->id,$package)){

                }else{
                    $package[] = $screen->screening->package->id;
                }
            }
        }
        if(count($package) == 2){
            $j = 15;
        }else{
            if(in_array('1',$package)){
                $j = 5;
            }if(in_array('2',$package)){
                $j = 10;
            }

        }
    }
//    $start = new DateTime($start);
    $date = "";$i = 0;
    for($m = 0; $m<30 ; $m++){
        $nextday = date('Y-m-d',strtotime($start)+(24*60*60));

        $holidays = array('2012-09-07');
        if (in_array(date('Y-m-d',strtotime($nextday)), $holidays)) {

        }elseif (date('D',strtotime($nextday)) == 'Sat' || date('D',strtotime($nextday)) == 'Sun') {

        } else{
            $i++;
        }
        if($i == $j){
            $date = date('j M Y',strtotime($nextday));
        }
        $start = $nextday;
    }
    return $date;

}
?>
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
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Order::where('status','pending')->get() as $employee)
        <tr class="gradeX">
            <td>{{ $employee->employee->id }}</td>
            <td style="text-transform: capitalize">{{  $employee->employee->firstname }} {{  $employee->employee->middlename }} {{  $employee->employee->lastname }}</td>
            <td class="hidden-phone">{{  $employee->company->name }}</td>
            <td class="hidden-phone">{{  $employee->employee->dob }}</td>
            <td class="center hidden-phone">{{  $employee->employee->address }}</td>
            <td class="center hidden-phone">{{  date('j M Y',strtotime($employee->created_at)) }}</td>
            <td class="center hidden-phone">{{  calculateRange(date('Y-m-d',strtotime($employee->created_at)),5,$employee) }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="..." id="{{ $employee->id }}">
                    @if($employee->file)
                    <a title="download files" href="{{ asset('uploads/'.$employee->file) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> </a>
                    @endif
                    <a title="confirm receiving" href="#s" class="btn btn-sm btn-success confirm"><i class="fa fa-check"></i> </a>
                    <a title="decline the order" href="#s" class="btn btn-sm btn-warning unconfirm" ><i class="fa fa-trash-o"></i> </a>

                </div>

            </td>
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
        $(".unconfirm").click(function(){
            var id1 = $(this).parent().attr('id');
            $(".unconfirm").show("slow").parent().parent().find("span").remove();
            $(".confirm").show("slow").parent().parent().find("span").remove();
            $(".confirm").show("slow");
            var btn = $(this).parent().parent().parent();
            var html = "<br>Specify Reason<br><textarea rows='3' placeholder='Reason'></textarea>"
            $(this).hide("slow").parent().append("<span>"+html+"<br> <a href='#s' id='yes' class='btn btn-primary btn-xs'><i class='fa fa-check'></i> Decline</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> Cancel</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".unconfirm").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                var txt = $(this).parent().find("textarea").val();
                if(txt == ""){
                    $(this).parent().find("textarea").focus().attr("placeholder","Write reason First")
                }else{
                    $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>Unconfirming, Please wait...");
                    var ss = $(this).parent();
                    $.post("<?php echo url('order/unconfirm') ?>/"+id1,{data:txt},function(data){
                        ss.html("<br><i class='fa fa-check'></i>Order Uncormfined...");
                        setTimeout(function() {
                            btn.hide("slow").next("hr").hide("slow");
                        }, 2000);
                    });
                }
            });
        });//endof deleting category
        $(".confirm").click(function(){
            var id1 = $(this).parent().attr('id');
            $(".confirm").show("slow").parent().parent().find("span").remove();
            $(".unconfirm").show("slow").parent().parent().find("span").remove();
            $(".unconfirm").show("slow");
            var btn = $(this).parent().parent().parent();
            $(this).hide("slow").parent().append("<span><br>Are You Sure you want to confirm this order<br />After confirming the order will be moved to confirmed menu<br><a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".confirm").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>confirming...");
                $.post("<?php echo url('order/confirm') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });//end of confirming order

    })
</script>
@stop