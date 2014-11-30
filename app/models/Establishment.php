<?php

class Establishment extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academic_establishment';

    protected $guarded = array("id");
	
	 public function academic(){
        return $this::belongsTo("Academic","id","academic_id");
    }
    
}