<?php

class Gapanalysis extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gapanalysis';

    protected $guarded = array("id");
	
	public function history(){
        return $this::hasMany("GapanalysisHistory","gapanalysis_id","id");
    }
    
}


