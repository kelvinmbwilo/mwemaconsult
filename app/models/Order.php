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
        return $this::hasMany("Result","order_id","id");
    }

    public function screening(){
            return $this::hasMany("OrderScreening","order_id","id");
        }

    public function company(){
        return $this->belongsTo("Company","company_id",'id');
    }
    public function result1(){
        return $this->belongsTo("Result","result_id",'id');
    }

    public function employee(){
        return $this::belongsTo("Employee","employee_id","id");
    }

    public function user(){
        return $this::belongsTo("User","sender","id");
    }

}
