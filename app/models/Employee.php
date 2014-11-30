<?php

class Employee extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee';

    protected $guarded = array("id");

    public function result(){
        return $this::hasMany("Result","employee_id","id");
    }

    public function company(){
        return $this->belongsTo("Company","company_id",'id');
    }

    public function order(){
        return $this::hasMany("Order","employee_id","id");
    }
    public function screening(){
        return $this::hasMany("OrderScreening","employee_id","id");
    }

}
