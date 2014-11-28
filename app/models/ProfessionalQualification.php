<?php

class ProfessionalQualification extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'professional_qualification';

    protected $guarded = array("id");
	
	 public function professional(){
        return $this::belongsTo("Professional","id","professionalid");
    }
    
}