<?php

class Iddocument extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'iddocumentcheck';

    protected $guarded = array("id");

    public function order(){
        return $this::belongsTo("OrderScreening","screen_id","id");
    }
    
}