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
            "result_id"   => mt_rand(100000,1000000),
            "status"      => 'pending',
            "sender"   => Auth::user()->id,
        ));
        foreach(Input::get('creteria') as $criteria){
            foreach(Package::find($criteria)->criteria as $criteria1){
                $orderScreen= OrderScreening::create(array(
                    "order_id" => $order->id,
                    "employee_id" => $employee->id,
                    "screen_id" => $criteria1->id,
                    "visibilty_status" => 'hidden'
                ));
                if($criteria1->package->id == 1){
                    $orderScreen->deadline = $this->calculateRange(date('Y-m-d',strtotime($order->created_at)),5);
                    $orderScreen->save();
                }elseif($criteria1->package->id == 2){
                    $orderScreen->deadline = $this->calculateRange(date('Y-m-d',strtotime($order->created_at)),5);
                    $orderScreen->save();
                }

            }
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
        $mail = Mail::later(5,'company.confirmemail', array('order' => $order), function($message)
        {
            $message->from('info@mwemadvocates.com', 'Mwema Advocate');
            $message->to(Auth::user()->email, Auth::user()->firstname." ".Auth::user()->lastname)->subject('Pre-employment Background Check Order Confirmation');
            $message->attach(asset('images/mwemadvocates.png'));
        });
        $mail = Mail::later(5,'company.confirmemail', array('order' => $order), function($message)
        {
            $message->from('info@mwemadvocates.com', 'Mwema Advocate');
            $message->to("order@mwemadvocates.com", "Mwema Advocates ")->subject('Pre-employment Background Check Order Confirmation');
            $message->attach(asset('images/mwemadvocates.png'));
        });
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Create a new order for ". $employee->firstname." ".$employee->lastname
        ));
        echo $order->result_id;
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
        if($screen->screening->name == "Academic Qualifications"){
            return View::make('summary.academic',compact('screen'));
        }elseif($screen->screening->name == "Adverse Media Search"){
            return View::make('summary.adverse',compact('screen'));
        }elseif($screen->screening->name == "Compliance Database Check"){
            return View::make('summary.compliance',compact('screen'));
        }elseif($screen->screening->name == "Criminal Check"){
            return View::make('summary.criminal',compact('screen'));
        }elseif($screen->screening->name == "CV Analysis"){
            return View::make('summary.cvanalysis',compact('screen'));
        }elseif($screen->screening->name == "Employment Historyand References"){
            return View::make('summary.employement',compact('screen'));
        }elseif($screen->screening->name == "Gap Analysis"){
            return View::make('summary.gapanalysis',compact('screen'));
        }elseif($screen->screening->name == "ID Document Check"){
            return View::make('summary.idcheck',compact('screen'));
        }elseif($screen->screening->name == "Professional Qualifications"){
            return View::make('summary.professional',compact('screen'));
        }else{
            return View::make('order.summary',compact('screen'));
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function published()
	{
        return View::make('admin.publishlist');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function declined()
	{
        return View::make('admin.declinelist');
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
            if($screen->visibilty_status == "hidden"){
                echo "<tr style='border-bottom: 1px solid #ffd1d1'>";
                echo "<th title=".$screen->screening->description.">".$screen->screening->name."</th>";
                echo "<td colspan='3'> Processing</td>";
                echo "</tr>";
            }else{
                echo "<tr style='border-bottom: 1px solid #ffd1d1'>";
                $prog = '<div class="progress">
                        <div title="'.$screen->complete.'%" class="progress-bar progress-bar-striped active progress-bar-'.$class.'" role="progressbar" aria-valuenow="'.$screen->complete.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$screen->complete.'%">
                        <span class="sr-only">'.$screen->complete.'</span>
                        </div>
                        </div>';
                echo "<th title=".$screen->screening->description.">".$screen->screening->name."</th>";
                echo "<td>".$prog."</td>";
                echo "<td id='".$screen->id."'><a href='#w' class='summary'> <i class='fa fa-th-list'></i> </a></td>";
                echo "<td id='".$screen->id."'><a href='".url("order/pdf/".$screen->id)."'> <i class='fa fa-cloud-download'></i> </a></td>";
                echo "</tr>";
            }
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
            });
        });



</script>

        <?php
    }

    public function generatePdf($id){
        
        $screen = OrderScreening::find($id);
        if($screen->screening->name == "Academic Qualifications"){
            
            //Generate pdf 
            $pdf = PDF::loadView('summary.academic',compact('screen'));
            return $pdf->download('Adverse Media Searchck.pdf'); //Download file

        }elseif($screen->screening->name == "Adverse Media Search"){
            
            //Generate pdf 
            $pdf = PDF::loadView('summary.adverse',compact('screen'));
            return $pdf->download('Adverse Media Searchck.pdf'); //Download file

        }elseif($screen->screening->name == "Compliance Database Check"){
            
            //Generate pdf 
            $pdf = PDF::loadView('summary.compliance',compact('screen'));
            return $pdf->download('Compliance Database Check.pdf'); //Download file

        }elseif($screen->screening->name == "Criminal Check"){

            //Generate pdf 
            $pdf = PDF::loadView('summary.criminal',compact('screen'));
            return $pdf->download('Criminal Check.pdf'); //Download file

        }elseif($screen->screening->name == "CV Analysis"){
                        
            //Generate pdf 
            $pdf = PDF::loadView('summary.cvanalysis',compact('screen'));
            return $pdf->download('CV Analysis.pdf'); //Download file 

        }elseif($screen->screening->name == "Employment Historyand References"){
            

            //Generate pdf 
            $pdf = PDF::loadView('summary.employement',compact('screen'));
            return $pdf->download('Employment Historyand References.pdf'); //Download file 

        }elseif($screen->screening->name == "Gap Analysis"){
            
            //Generate pdf 
            $pdf = PDF::loadView('summary.gapanalysis',compact('screen'));
            return $pdf->download('Gap Analysis.pdf'); //Download file 

        }elseif($screen->screening->name == "ID Document Check"){
            //return View::make('summary.idcheck',compact('screen'));
            
            //Generate pdf 
            $pdf = PDF::loadView('summary.idcheck',compact('screen'));
            return $pdf->download('ID Document Check.pdf');

        }elseif($screen->screening->name == "Professional Qualifications"){
            return View::make('summary.professional',compact('screen'));
        }else{
            return View::make('order.summary',compact('screen'));
        }
        
 }

    public function idshow($id)
    {
        $screen = OrderScreening::find($id);
        return View::make('summary.idcheck',compact('screen'));
    }

        function calculateRange($start,$j){

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
}
