<?php

class GapanalysisHistory extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gapanalysis_history';

    protected $guarded = array("id");
	 public function gapanalysis(){
        return $this->belongsTo("Gapanalysis","gapanalysis_id",'id');
    }
    
}


