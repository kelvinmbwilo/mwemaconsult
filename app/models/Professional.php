<?php

class Professional extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academic';

    protected $guarded = array("id");
	
	 public function establishment(){
        return $this::hasMany("ProfessionalEstablishment","professionalid","id");
    }
	public function qualification(){
        return $this::hasMany("ProfessionalQualification","professionalid","id");
    }
    
}