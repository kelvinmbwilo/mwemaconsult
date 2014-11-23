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


}
