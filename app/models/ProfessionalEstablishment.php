<?php

class ProfessionalEstablishment extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'professional_establishment';

    protected $guarded = array("id");
	
	 public function professional(){
        return $this::belongsTo("Professional","id","professionalid");
    }
    
}