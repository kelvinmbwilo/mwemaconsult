<?php

class AdversemediaMatches extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adverse_namesmatched';

    protected $guarded = array("id");
	
    public function order(){
        return $this::belongsTo("Adversemedia","id","adverseid");
    }
	
    
}
