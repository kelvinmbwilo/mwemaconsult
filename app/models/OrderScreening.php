<?php

class OrderScreening extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orderScreening';

    protected $guarded = array("id");

    public function order(){
        return $this::belongsTo("Order","order_id","id");
    }

    public function screening(){
        return $this->belongsTo("Screening","screen_id",'id');
    }

    public function employee(){
        return $this::belongsTo("Employee","employee_id","id");
    }

    public function idcheck(){
        return $this->hasOne('Iddocument', 'screen_id', 'id');
    }

}
