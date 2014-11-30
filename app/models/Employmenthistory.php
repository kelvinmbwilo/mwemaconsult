<?php

class Employmenthistory extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emphistory';

    protected $guarded = array("id");
     public function order(){
        return $this::belongsTo("OrderScreening","screen_id","id");
    }
    public function historydates(){
        return $this::hasMany("Historydates","emphistory_id","id");
    }
    public function historyjobs(){
        return $this::hasMany("Historyjobs","emphistory_id","id");
    }
	public function historyreference(){
        return $this::hasMany("Historyreference","emphistory_id","id");
    }
}
