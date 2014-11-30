<?php

class Adversemedia extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adversemediacheck';

    protected $guarded = array("id");
	
    public function order(){
        return $this::belongsTo("OrderScreening","screen_id","id");
    }
	public function matches(){
        return $this::hasMany("AdversemediaMatches","adverseid","id");
    }
    
}
