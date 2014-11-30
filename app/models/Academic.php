<?php

class Academic extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academic';

    protected $guarded = array("id");
	
	 public function establishment(){
        return $this::hasMany("Establishment","academic_id","id");
    }
	public function qualification(){
        return $this::hasMany("Qualification","academic_id","id");
    }
    
}