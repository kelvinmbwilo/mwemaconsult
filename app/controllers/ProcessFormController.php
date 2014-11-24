<?php

class ProcessFormController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

    public function idcheck($id){
        $iddoc = Iddocument::create(array(
           "validated" => Input::get('candidateidentity'),
           "rating" => Input::get('ConfidenceRating'),
           "alias" => Input::get('AliasName'),
           "mortality" => Input::get('Mortality'),
           "currentaddress" => Input::get('addresssuggestion'),
           "datapiece" => Input::get('candidateidentity'),
           "screen_id" => $id,
           "id_score" => Input::get('validscore'),
           "description" => Input::get('coments'),
           "address_score" => Input::get('adresscore')
        ));

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->visibilty_status = 'hidden';
        $screen->save();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }


}
