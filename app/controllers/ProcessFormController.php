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
        $avg = intval(($iddoc->id_score + $iddoc->address_score)/2);

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $avg;
        $screen->visibilty_status = 'hidden';
        $screen->save();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }

    //***************************************
    ///Submit adverse check form
    public function adversecheck($id){
        $adversemedia = Adversemedia::create(array(
            "searchteam" => Input::get('searchterms'),
            "datesearch" => Input::get('datesearch'),
            "totalmatches" => Input::get('totalmatch'),
            "matchesonly" => Input::get('matchonly'),
            "comments" => Input::get('coments'),
            "screen_id" => $id,
            "namescore" => Input::get('namescore')
        ));
        //Process Adverse media name matches These are the arrays treet them right

        $namemarchArr=Input::get('namemarch');
        $dobArr=Input::get('dob');
        $extractArr=Input::get('extract');

        for($i=0;$i<sizeof($namemarchArr); $i++)
        {
            $namem=$namemarchArr[$i];
            $dob=$dobArr[$i];
            $extract=$extractArr[$i];

            if($namem !="")
            {
                $AdversemediaMatches = AdversemediaMatches::create(array(
                    "namematchedon" => $namem,
                    "age" => $dob,
                    "Extract" => $extract,
                    "adverseid" =>$adversemedia->id
                ));
            }
        }

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $adversemedia->namescore;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }


    ///////////////Process complience form

    public function compliencecheck($id)
    {
        //
        $compliance= Compliance::create(array(
            "searchteam" => Input::get('searchteam'),
            "datesearch" => Input::get('datesearch'),
            "totalmatches" => Input::get('totalmatches'),
            "matchesqualified" => Input::get('matchesqualified'),
            "possiblematches" => Input::get('possiblematches'),
            "comments" => Input::get('coments'),
            "screen_id" => $id,
            "namescore" => Input::get('namescore'),

        ));

        //Process A	compliance_matches

        $namematchedonArr=Input::get('namematchedon');
        $issuingentityArr=Input::get('issuingentity');
        $typeArr=Input::get('type');
        $reasonArr=Input::get('reason');

        for($i=0;$i<sizeof($namematchedonArr); $i++)
        {
            $namematchedon=$namematchedonArr[$i];
            $issuingentity=$issuingentityArr[$i];
            $type=$typeArr[$i];
            $reason=$reasonArr[$i];

            if($namematchedon !="" && $issuingentity != "" && $type !="")
            {
                $compliancematches = Compliancematches::create(array(
                    "namematchedon" => $namematchedon,
                    "issuingentity" => $issuingentity,
                    "type" => $type,
                    "resonqualified" =>$reason,
                    "complianceid" =>$compliance->id
                ));
            }
        }

        //Process match posibilities
        $pnamematchedonArr=Input::get('pnamematchedon');
        $pissuingentityArr=Input::get('pissuingentity');
        $ptypeArr=Input::get('ptype');
        $pextractArr=Input::get('pextract');

        for($i=0;$i<sizeof($pnamematchedonArr); $i++)
        {
            $pnamematchedon=$pnamematchedonArr[$i];
            $pissuingentity=$pissuingentityArr[$i];
            $ptype=$ptypeArr[$i];
            $pextract=$pextractArr[$i];

            if($pnamematchedon !="" && $pissuingentity != "" && $ptype !="")
            {
                $complianceposibles = Complianceposibles::create(array(
                    "namematchedon" => $pnamematchedon,
                    "issuingentity" => $pissuingentity,
                    "type" => $ptype,
                    "extract" =>$pextract,
                    "complianceid" =>$compliance->id
                ));
            }
        }
        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $compliance->namescore;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";

    }

    //Proceee Employement form
    public function employeehistory($id)
    {


        //Process Employment history and references
        $organisationArr=Input::get('organisation');
        $referencemethodArr=Input::get('referencemethod');
        $dateproducedArr=Input::get('dateproduced');
        $historyscoreArr=Input::get('historyscore');
        $cpositionheldArr=Input::get('cpositionheld');
        $rpositionArr=Input::get('rposition');
        $candidate_sdateArr=Input::get('candidate_sdate');
        $referee_sdateArr=Input::get('referee_sdate');
        $candidate_edatedArr=Input::get('candidate_edate');
        $referee_edateArr=Input::get('referee_edate');
        $sum = 0; $num = 0;
        for($i=0;$i<sizeof($organisationArr); $i++)
        {
            $organisation=$organisationArr[$i];
            $referencemethod=$referencemethodArr[$i];
            $dateproduced=$dateproducedArr[$i];
            $historyscore=$historyscoreArr[$i];
            $cpositionhel=$cpositionheldArr[$i];
            $rposition=$rpositionArr[$i];
            $candidate_sdate=$candidate_sdateArr[$i];
            $referee_sdate=$referee_sdateArr[$i];
            $candidate_edate=$candidate_edatedArr[$i];
            $referee_edate=$referee_edateArr[$i];
            if($organisation !="")
            {
                $sum += $historyscore;$num++;
                $employmenthistory= Employment::create(array(
                    "comments"          => Input::get('coments'),
                    "screen_id"         => $id,
                    "organisation"      => $organisation,
                    "referencemethod"   => $referencemethod,
                    "dateproduced"      => $dateproduced,
                    "history_score"     =>$historyscore,
                    "cpositionheld"     => $cpositionhel,
                    "rposition"         => $rposition,
                    "candidate_sdate"   => $candidate_sdate,
                    "referee_sdate"     => $referee_sdate,
                    "eferee_edate"     => $referee_edate,
                    "candidate_edate"   => $candidate_edate,
                ));
            }
        }
        $avg = intval($sum/$num);
        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $avg;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }

    ///Process Academic

    public function academic($id)
    {
        $academic= Academic::create(array(
            "comments" => Input::get('coments'),
            "screen_id" => $id

        ));

        //Process Establishment
        $establish_nameArr	    =Input::get('establish_name');
        $referencemethodArr     =Input::get('referencemethod');
        $dateproducedArr        =Input::get('dateproduced');
        $qualiscoreArr          =Input::get('qualiscore');
        $checkstudyArr	        =Input::get('checkstudy');
        $candidate_adateArr     =Input::get('candidate_adate');
        $reference_adateArr     =Input::get('reference_adate');
        $reference_courseArr    =Input::get('reference_course');
        $candidate_gradeArr     =Input::get('candidate_grade');
        $candidate_courseArr    =Input::get('candidate_course');
        $reference_gradeArr     =Input::get('reference_grade');
        $sum = 0; $num = 0;
        for($i=0;$i<sizeof($establish_nameArr); $i++)
        {
            $establish_name     =$establish_nameArr[$i];
            $referencemethod    =$referencemethodArr[$i];
            $dateproduced       =$dateproducedArr[$i];
            $qualiscore         =$qualiscoreArr[$i];
            $checkstudy         =$checkstudyArr[$i];
            $candidate_adate    =$candidate_adateArr[$i];
            $reference_adate    =$reference_adateArr[$i];
            $reference_course   =$reference_courseArr[$i];
            $candidate_grade    =$candidate_gradeArr[$i];
            $candidate_course   =$candidate_courseArr[$i];
            $reference_grade    =$reference_gradeArr[$i];


            if($establish_name !="" )
            {
                $sum += $qualiscore;$num++;
                $establishment = Establishment::create(array(
                    "establish_name"    => $establish_name,
                    "referencemethod"   => $referencemethod,
                    "dateproduced"      => $dateproduced,
                    "qualiscore"        => $qualiscore,
                    "checkstudy"        => $checkstudy,
                    "candidate_adate"   => $candidate_adate,
                    "reference_adate"   => $reference_adate,
                    "candidate_course"  => $candidate_course,
                    "reference_course"  => $reference_course,
                    "candidate_grade"   => $candidate_grade,
                    "reference_grade"   => $reference_grade,
                    "academic_id"       => $academic->id

                ));
            }
        }
        $avg = intval($sum/$num);
        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $avg;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }

    ///Prrocess crimina form
    public function criminal($id)
    {
        $academic= Criminal::create(array(
            "comments" => Input::get('coments'),
            "namescore" => Input::get('namescore'),
            "screen_id" => $id

        ));

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $academic->namescore;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";

    }
//
    ///Prrocess Cv analysis form
    public function cvanalysis($id)
    {
        $academic= Cvnalysis::create(array(
            "comments" => Input::get('coments'),
            "cvscore" => Input::get('cvscore'),
            "screen_id" => $id

        ));

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $academic->cvscore;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";

    }
//
//
    //Process proffesional forms
    public function professional($id)
    {
        $professional= Professional::create(array(
            "Comments" => Input::get('coments'),
            "screen_id" => $id

        ));

        //Process Establishment
        $establish_nameArr	    =Input::get('establish_name');
        $referencemethodArr     =Input::get('referencemethod');
        $dateproducedArr        =Input::get('dateproduced');
        $qualiscoreArr          =Input::get('qualiscore');
        $checkstudyArr	        =Input::get('checkstudy');
        $candidate_adateArr     =Input::get('candidate_adate');
        $reference_adateArr     =Input::get('reference_adate');
        $reference_courseArr    =Input::get('reference_course');
        $candidate_courseArr    =Input::get('candidate_course');
        $sum = 0; $num = 0;
        for($i=0;$i<sizeof($establish_nameArr); $i++)
        {
            $establish_name     =$establish_nameArr[$i];
            $referencemethod    =$referencemethodArr[$i];
            $dateproduced       =$dateproducedArr[$i];
            $qualiscore         =$qualiscoreArr[$i];
            $checkstudy         =$checkstudyArr[$i];
            $candidate_adate    =$candidate_adateArr[$i];
            $reference_adate    =$reference_adateArr[$i];
            $reference_course   =$reference_courseArr[$i];
            $candidate_course   =$candidate_courseArr[$i];


            if($establish_name !="" )
            {
                $sum += $qualiscore;$num++;
                $establishment = ProfessionalEstablishment::create(array(
                    "establish_name" => $establish_name,
                    "referencemethod" => $referencemethod,
                    "dateproduced" => $dateproduced,
                    "qualiscore" => $qualiscore,
                    "checkstudy" => $checkstudy,
                    "candidate_adate" => $candidate_adate,
                    "reference_adate" => $reference_adate,
                    "candidate_course" => $candidate_course,
                    "reference_course" => $reference_course,
                    "professionalid"=>$professional->id

                ));
            }
        }
        $avg = intval($sum/$num);

        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $avg;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";
    }

    ///Process gap analysis forms
    public function gapanalysis($id)
    {
        $gapanalysis= Gapanalysis::create(array(
            "Comments" => Input::get('coments'),
            "gapscore" => Input::get('gapscore'),
            "screen_id" => $id

        ));

        $eperiodArr=Input::get('eperiod');
        $egcommentsArr=Input::get('egcomments');
        for($i=0;$i<sizeof($eperiodArr); $i++)
        {

            $eperiod=$eperiodArr[$i];
            $egcomments=$egcommentsArr[$i];

            if($eperiod !="" )
            {
                $qualification = GapanalysisHistory::create(array(
                    "period" => $eperiod,
                    "comments" => $egcomments,
                    "gapanalysis_id"=>$gapanalysis->id

                ));
            }
        }
        $screen = OrderScreening::find($id);
        $screen->complete = 100;
        $screen->mark = $gapanalysis->gapscore;
        $screen->visibilty_status = 'hidden';
        $screen->save();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Fill in ".$screen->screening->name." form for ".  $screen->employee->firstname ." ". $screen->employee->lastname  ."from" . $screen->employee->company->name
        ));
        return "<h4 class='text-success'>Form Updated Successful</h4>";



    }

}
