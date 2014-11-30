<?php

class Result extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    protected $guarded = array("id");

    public function company(){
        return $this->belongsTo("Company","company_id",'id');
    }
    public function order(){
        return $this->belongsTo("Order","order_id",'id');
    }
    public function screen(){
        return $this->belongsTo("Screening","screen_id",'id');
    }

    public function employee(){
        return $this::belongsTo("Employee","employee_id","id");
    }

}