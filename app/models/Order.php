<?php

class Order extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    protected $guarded = array("id");

    public function result(){
        return $this::hasMany("Result","result_id","id");
    }

    public function company(){
        return $this->belongsTo("Company","company_id",'id');
    }

    public function employee(){
        return $this::belongsTo("Employee","employee_id","id");
    }

}
