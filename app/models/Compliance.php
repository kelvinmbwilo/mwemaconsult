<?php

class Compliance extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compliance';

    protected $guarded = array("id");

    public function order(){
        return $this::belongsTo("OrderScreening","screen_id","id");
    }
    public function getmatches(){
        return $this->hasMany('Compliancematches', 'complianceid', 'id');
    }
    public function getposibles(){
        return $this->hasMany('Complianceposibles', 'complianceid', 'id');
    }
}


