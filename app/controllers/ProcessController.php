<?php

class ProcessController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.listorder');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function confirm(){
        return View::make('admin.confirmlist');
    }

    public function unconfirm($id){
        $order = Order::find($id);
        $order->status = 'Declined';
        $order->completed_date = Input::get('data');
        $order->save();
        $array = array("name"=>$order->user->firstname." ".$order->user->lastname,"email"=>$order->user->email);
        Mail::later(5,'company.confirmemail3', array('order' => $order), function($message) use($array)
        {
            $message->from('info@mwemadvocates.com', 'Mwema Advocate');
            $message->to($array['email'], $array['name'])->subject('Pre-employment Background Check Order Declined ');
            $message->attach(asset('mwemadvocates.png'));
        });
        $mail = Mail::later(5,'company.confirmemail3', array('order' => $order), function($message)
        {
            $message->from('info@mwemadvocates.com', 'Mwema Advocate');
            $message->to("order@mwemadvocates.com", "Mwema Advocates ")->subject('Pre-employment Background Check Order Declined');
            $message->attach(asset('mwemadvocates.png'));
        });
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"decline a new order for ". $order->employee->firstname." ".$order->employee->lastname
        ));
    }

    public function confirmorder($id){
        $order = Order::find($id);
        $order->status = 'In Progress';
        $order->save();
        $array = array("name"=>$order->user->firstname." ".$order->user->lastname,"email"=>$order->user->email);
        Mail::send('company.confirmemail1', array('order' => $order), function($message) use($array)
        {
            $message->from('mwemadvocate@gmail.com', 'Mwema Advocate');
            $message->to($array['email'], $array['name'])->subject('Pre-employment Background Check Order');
            $message->attach(asset('mwemadvocates.png'));
        });
        $mail = Mail::later(5,'company.confirmemail1', array('order' => $order), function($message)
        {
            $message->from('info@mwemadvocates.com', 'Mwema Advocate');
            $message->to("order@mwemadvocates.com", "Mwema Advocates ")->subject('Pre-employment Background Check Order');
            $message->attach(asset('mwemadvocates.png'));
        });
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"confirm a new order for ". $order->employee->firstname." ".$order->employee->lastname
        ));
    }
    public function publishorder($id){
        $order = OrderScreening::find($id);
        $order->visibilty_status = 'show';
        $order->save();
    }

    public function publishall($id){
        $order = Order::find($id);
        foreach($order->screening as $screen){
            $screen->visibilty_status = 'show';
            $screen->save();
        }
        $order->status = 'Complete';
        $order->completed_date = date('j M Y');
        $order->save();
    }
    public function selectforms($id){
        $order = Order::find($id);

        echo '<table style="width: 100%" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        echo "<tr>";
        echo "<th style='width: 20%'>Screening Type</th>";
        echo "<th>Complete(%)</th>";
        echo "<th style='width: 20%'>Update</th>";
        echo "<th style='width: 20%'>View Report</th>";
        echo "<th style='width: 5%'>Get Report</th>";
        echo "<th style='width: 5%'>publish</th>";
        echo "</tr>";
        $total = 0;$i = 0;
        $idd = $order->id;
        foreach($order->screening as $screen){
            $total += $screen->complete; $i ++;
            if($screen->complete >= 80 && $screen->complete <= 100 ){
                $class = "success";
            }elseif($screen->complete >= 50 && $screen->complete <= 80){
                $class = "primary";
            }elseif($screen->complete >= 20 && $screen->complete <= 50){
                $class = "warning";
            }else{
                $class = "danger";
            }
            echo "<tr style='border-bottom: 1px solid #ffd1d1'>";
            $prog = '<div class="progress">
                    <div title="'.$screen->complete.'%" class="progress-bar progress-bar-striped active progress-bar-'.$class.'" role="progressbar" aria-valuenow="'.$screen->complete.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$screen->complete.'%">
                    <span class="sr-only">'.$screen->complete.'</span>
                    </div>
                    </div>';
            echo "<th title=".$screen->screening->description.">".$screen->screening->name."</th>";
            echo "<td>".$prog."</td>";
            echo "<td id='".$screen->id."'><a href='#' class='addform'> <i class='fa fa-pencil'></i> Update Form </a></td>";
            echo "<td id='".$screen->id."'><a href='#' class='summary'> <i class='fa fa-th-list'></i> view Report </a></td>";
            echo "<td><a href='".url("order/pdf/".$screen->id)."'> <i class='fa fa-download'></i>  </a></td>";

            if($screen->visibilty_status == 'show'){
                echo "<td id='".$screen->id."'>Published</td>";
            }else{
                if($screen->complete != 100){
                    echo "<td id='".$screen->id."'>Not Filled</td>";
                }else{
                    echo "<td id='".$screen->id."'><a href='#w' class='publish'> <i class='fa fa-check text-success'></i> </a></td>";
                }

            }

            echo "</tr>";
        }
        echo "</table>";
        $avg = intval($total/$i);
        if($avg >= 80 && $avg <= 100 ){
            $class1 = "success";
        }elseif($avg >= 50 && $avg <= 80){
            $class1 = "primary";
        }elseif($avg >= 20 && $avg <= 50){
            $class1 = "warning";
        }else{
            $class1 = "danger";
        }
        echo '<br>
        <div class="col-sm-10">
        <div class="progress">
              <div title="'.$avg.'%" class="progress-bar progress-bar-'.$class1.' progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$avg.'%">
                <span class="sr-only">20% Complete</span>
              </div>
            </div></div>';
        if($order->status == 'In Progress'){
            echo '<div class="col-sm-2"><a href="#d" class="btn btn-primary publishall" id="'.$idd.'"><i class="fa fa-check"></i> Mark as Complete </a> </div>';
        }else{
            echo '<i class="fa fa-check"></i> Complete </a> </div>';
        }
        ?>
        <script>
            $(".summary").click(function(){
                var id1 = $(this).parent().attr('id');
                var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                modal+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
                modal+= '<div class="modal-content">';
                modal+= '<div class="modal-header">';
                modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                modal+= '<h4 class="modal-title" id="myModalLabel">Candidate Report</h4>';
                modal+= '</div>';
                modal+= '<div class="modal-body">';
                modal+= ' </div>';
                modal+= '</div>';
                modal+= '</div>';

                $("body").append(modal);
                $("#myModal").modal("show");
                $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                $(".modal-body").load("<?php echo url("order/screen/") ?>/"+id1);
                $("#myModal").on('hidden.bs.modal',function(){
                    $("#myModal").remove();
                })

            })
            $(".addform").click(function(){
                var id1 = $(this).parent().attr('id');
                var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                modal+= '<div class="modal-dialog" style="width:90%;margin-right: 5% ;margin-left: 5%">';
                modal+= '<div class="modal-content">';
                modal+= '<div class="modal-header">';
                modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                modal+= '<h4 class="modal-title" id="myModalLabel">Candidate Screening Form</h4>';
                modal+= '</div>';
                modal+= '<div class="modal-body">';
                modal+= ' </div>';
                modal+= '</div>';
                modal+= '</div>';

                $("body").append(modal);
                $("#myModal").modal("show");
                $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                $(".modal-body").load("<?php echo url("order/fill/") ?>/"+id1);
                $("#myModal").on('hidden.bs.modal',function(){
                    $("#myModal").remove();
                })

            })

            $(".publish").click(function(){
                var id1 = $(this).parent().attr('id');
                $(".publish").show("slow").parent().parent().find("span").remove();
                var btn = $(this).parent();
                $(this).hide("slow").parent().append("<span><br>Are You Sure <br /><br><a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                $("#no").click(function(){
                    $(this).parent().parent().find(".publish").show("slow");
                    $(this).parent().parent().find("span").remove();
                });
                $("#yes").click(function(){
                    $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>publishing...");
                    $.post("<?php echo url('order/publish') ?>/"+id1,function(data){
                        btn.html("Published");
                    });
                });
            });
            $(".publishall").click(function(){
                var id1 = $(this).attr('id');
                $(".publishall").show("slow").parent().find("span").remove();
                var btn = $(this).parent();
                $(this).hide("slow").parent().append("<span><br>Are You Sure <br /><br><a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                $("#no").click(function(){
                    $(this).parent().parent().find(".publishall").show("slow");
                    $(this).parent().parent().find("span").remove();
                });
                $("#yes").click(function(){
                    $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>publishing...");
                    $.post("<?php echo url('order/publishall') ?>/"+id1,function(data){
                        btn.html("<i class='fa fa-check'></i> Published");
                    });
                });
            });
        </script>

    <?php
    }

    public function fillform($id){
        $screen = OrderScreening::find($id);
        if($screen->screening->name == "Academic Qualifications"){
            return View::make("screening.academic",compact('screen'));
        }elseif($screen->screening->name == "Adverse Media Search"){
            return View::make("screening.adverse",compact('screen'));
        }elseif($screen->screening->name == "Compliance Database Check"){
            return View::make("screening.compliance",compact('screen'));
        }elseif($screen->screening->name == "Criminal Check"){
            return View::make("screening.criminal",compact('screen'));
        }elseif($screen->screening->name == "CV Analysis"){
            return View::make("screening.cvanalysis",compact('screen'));
        }elseif($screen->screening->name == "Employment Historyand References"){
            return View::make("screening.employement",compact('screen'));
        }elseif($screen->screening->name == "Gap Analysis"){
            return View::make("screening.gapanalysis",compact('screen'));
        }elseif($screen->screening->name == "ID Document Check"){
            return View::make("screening.identitycheck",compact('screen'));
        }elseif($screen->screening->name == "Professional Qualifications"){
            return View::make("screening.professional",compact('screen'));
        }else{
            echo "Haijapatikana";
        }
    }

}
