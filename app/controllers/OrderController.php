<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("order.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("company.neworder");
	}


	/**
	 * Store a newly created resource in storage.
	 *
     * @param id
	 * @return Response
	 */
	public function store($id)
	{

        $company = Company::find($id);
        $employee = Employee::create(array(
            "company_id" => $id,
            "firstname"  => Input::get("firstname"),
            "middlename" => Input::get("middlename"),
            "lastname"   => Input::get("lastname"),
            "dob"        => Input::get("dob"),
            "gender"     => Input::get("gender"),
            "address"    => Input::get("address")
        ));
        $order = Order::create(array(
            "company_id"  => $id,
            "employee_id" => $employee->id,
            "result_id"   => 0,
            "status"      => 'pending'
        ));
        foreach(Input::get('creteria') as $criteria){
            $orderScreen= OrderScreening::create(array(
                "order_id" => $order->id,
                "employee_id" => $employee->id,
                "screen_id" => $criteria
            ));

        }
        if(Input::file('docs')){
            $file = Input::file('docs'); // your file upload input field in the form should be named 'file'
            $destinationPath = public_path().'/uploads';
            $filename = $file->getClientOriginalName();
            //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
            $uploadSuccess = Input::file('docs')->move($destinationPath, $filename);
            chmod($destinationPath ."/".$filename , 0777);
            if($uploadSuccess ){
                $order->file = $filename;
                $order->save();
            }
        }
        Mail::send('company.confirmemail', array('key' => 'value'), function($message)
        {
            $message->from('mwemaadvocate@gmail.com', 'Mwema Advocate');
            $message->to('kelvinmbwilo@gmail.com', 'John Smith')->subject('Welcome!');
            $message->attach(asset('images/logo1.png'));
        });
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Create a new order for ". $employee->firstname." ".$employee->lastname
        ));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$screen = OrderScreening::find($id);
        return View::make('order.summary',compact('screen'));
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

    public function summarylist($id){
        $order = Order::find($id);

        echo '<table style="width: 100%" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        echo "<tr>";
        echo "<th>Screening Type</th>";
        echo "<th>Complete</th>";
        echo "<th style='width: 10%'>View Summary</th>";
        echo "<th style='width: 10%'>Get Report</th>";
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
            echo "<td id='".$screen->id."'><a href='#' class='summary'> <i class='fa fa-th-list'></i> </a></td>";
            echo "<td><a href='#'> <i class='fa fa-cloud-download'></i> </a></td>";
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

    public function generatePdf(){
        $pdf = new TCPDF();

        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->Text(90, 140, 'This is a test');
        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'F');

        return Response::download($filename);
 }
}
