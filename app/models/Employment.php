<?php

class Employment extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emphistory';

    protected $guarded = array("id");
    
    public function historydates(){
        return $this::hasMany("Historydates","emphistory_id","id");
    }
    public function historyjobs(){
        return $this::hasMany("Historyjobs","emphistory_id","id");
    }
}
