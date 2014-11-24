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
            foreach(Package::find($criteria)->criteria as $criteria1){
                $orderScreen= OrderScreening::create(array(
                    "order_id" => $order->id,
                    "employee_id" => $employee->id,
                    "screen_id" => $criteria1->id,
                    "visibilty_status" => 'hidden'
                ));
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
        $mail = Mail::send('company.confirmemail', array('key' => 'value'), function($message)
        {
            $message->from('mwemadvocate@gmail.com', 'Mwema Advocate');
            $message->to(Auth::user()->email, Auth::user()->firstname." ".Auth::user()->lastname)->subject('Welcome!');
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
        if($screen->screening->name == "Academic Qualifications"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "Adverse Media Search"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "Compliance Database Check"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "Criminal Check"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "CV Analysis"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "Employment Historyand References"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "Gap Analysis"){
            return View::make('order.summary',compact('screen'));
        }elseif($screen->screening->name == "ID Document Check"){
            return View::make('summary.idcheck',compact('screen'));
        }elseif($screen->screening->name == "Professional Qualifications"){
            return View::make('order.summary',compact('screen'));
        }else{
            return View::make('order.summary',compact('screen'));
        }

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
                echo "<td id='".$screen->id."'><a href='#w'> <i class='fa fa-cloud-download'></i> </a></td>";
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
        if($screen->idcheck->address_score == 1){
            $color = "#91CF4F";
        }elseif($screen->idcheck->address_score == 2){
            $color = "#FFBF00";
        }elseif($screen->idcheck->address_score == 3){
            $color = "#red";
        }else{
            $color = "#gray";
        }

        if($screen->idcheck->id_score == 1){
            $color1 = "#91CF4F";
        }elseif($screen->idcheck->id_score == 2){
            $color1 = "#FFBF00";
        }elseif($screen->idcheck->id_score == 3){
            $color1 = "#red";
        }else{
            $color1 = "#gray";
        }
        $descr = $screen->idcheck->description;
        $validate = $screen->idcheck->validated;
        $rating =$screen->idcheck->rating;
        $alias =$screen->idcheck->alias;
        $mortality =$screen->idcheck->mortality;
        $curradd =$screen->idcheck->currentaddress;
        $data =$screen->idcheck->datapiece;

        $pdf = new TCPDF();

        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $name = 'kelvin';
      ///$html = '<style>'.file_get_contents(asset("bs3/css/bootstrap.min.css")).'</style>';
        $html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
        background-color: #ccffcc;
    }
    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>

<div class="row">

<div class="col-md-12">
<h4>Report Details</h4>
<table>
  <tr>
  <th>Background Checks Included Within This Report:</th><th>Status</th>
  </tr>
  <tr>
  <td><div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Identity Validation</b></div></td><td><div style="padding: 0px; background-color: $color1 ;height: 25px" ></div></td>
  </tr>
  <tr>
  <td><div class="col-sm-10" style="padding: 5px; background-color: #F3F3F3;height: 25px"><b>Address Check</b></div></td><td><div style="padding: 0px; background-color: $color ;height: 25px" ></div></td>
  </tr>
</table>

</div>
<div class="col-md-12">
    <br>
<h4>Observations</h4>
<div class="col-sm-12" style="padding: 10px; background-color: #F3F3F3;height: 100px;font-size: 1.2em">

     $descr
</div>
</div>
    <div class="col-md-12">
        <h3>Identity Check</h3><hr>
    <h4>Identity Validation</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Candidate Identity Validated?</th>
            <th>Confidence Rating<br>
                (Low / Medium / High)</th>
            <th>Alias Names found</th>
            <th>Mortality file match?</th>
        </tr>
        <tr>
            <td> $validate </td>
            <td> $rating </td>
            <td> $alias </td>
            <td> $mortality </td>
        </tr>
    </table>

        <h4>Address Check</h4>
    <table class="table table-bordered table-striped summarytable">
        <tr>
            <th>Does the data suggest the candidate is resident at their current
                address?</th>
            <th>How many pieces of data support the validation?</th>
        </tr>
        <tr>
            <td> $curradd </td>
            <td>$data </td>
        </tr>
    </table>
</div>
    </div>
EOF;
        $pdf->writeHTML($html, true, false, true, false, '');
        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'F');

        return Response::download($filename);
 }

    public function idshow($id)
    {
        $screen = OrderScreening::find($id);
        return View::make('summary.idcheck',compact('screen'));
    }
}
