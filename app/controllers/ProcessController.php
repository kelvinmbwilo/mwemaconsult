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
        $order->save();
    }

    public function confirmorder($id){
        $order = Order::find($id);
        $order->status = 'In Progress';
        $order->save();
    }
    public function selectforms($id){
        $order = Order::find($id);

        echo '<table style="width: 100%" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        echo "<tr>";
        echo "<th style='width: 20%'>Screening Type</th>";
        echo "<th>Complete(%)</th>";
        echo "<th style='width: 20%'>View Summary</th>";
        echo "<th style='width: 20%'>Get Report</th>";
        echo "<th style='width: 5%'>Get Report</th>";
        echo "</tr>";
        $total = 0;$i = 0;
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
            echo "<th>".$screen->screening->name."</th>";
            echo "<td>".$prog."</td>";
            echo "<td id='".$screen->id."'><a href='#' class='summary'> <i class='fa fa-pencil'></i> Update Form </a></td>";
            echo "<td><a href='#'> <i class='fa fa-th-list'></i> view Summary Report </a></td>";
            echo "<td><a href='#'> <i class='fa fa-download'></i>  </a></td>";
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
        echo '<br><div class="progress">
              <div title="'.$avg.'%" class="progress-bar progress-bar-'.$class1.' progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$avg.'%">
                <span class="sr-only">20% Complete</span>
              </div>
            </div>';
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
        </script>

    <?php
    }

}
