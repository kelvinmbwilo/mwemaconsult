<?php

class CompanyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        Return View::make("company.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        Return View::make("company.add");
	}

    public function companylist()
    {
        Return View::make("company.list");
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$company = Company::create(array(
           "name" => Input::get("name"),
           "address" => Input::get("address"),
           "region" => Input::get("region"),
           "email" => Input::get("email"),
           "tel" => Input::get("phone"),
           "fax" => Input::get("fax")
        ));
        $name = $company->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Register Company named ".$name
        ));
        return "<h4 class='text-success'>Company Successful Registered</h4>";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$company = Company::find($id);
        return View::make('company.dashboard',compact('company'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$company = Company::find($id);
        return View::make('company.edit',  compact("company"));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$company = Company::find($id);
        $company->name = Input::get("name");
        $company->address = Input::get("address");
        $company->region = Input::get("region");
        $company->email = Input::get("email");
        $company->tel = Input::get("phone");
        $company->fax = Input::get("fax");
        $company->save();
        $name = $company->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update Company named ".$name
        ));
        return "<h4 class='text-success'>Company Updated Successful</h4>";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$company = Company::find($id);
        foreach($company->employee as $value){
            $value->delete();
        }foreach($company->orders as $value){
            $value->delete();
        }foreach($company->results as $value){
            $value->delete();
        }
        $company->delete();
	}

    public function adduser($id){
        $company = Company::find($id);
        Return View::make("company.useradd",compact("company"));
    }

    public function listuser($id){
        $company = Company::find($id);
        Return View::make("company.listusers",compact("company"));
    }

    public function listusers($id){
        $company = Company::find($id);
        Return View::make("user.listcompanyuser",compact("company"));
    }

}
