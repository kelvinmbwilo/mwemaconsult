<?php

class Company extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company';

    protected $guarded = array("id");

    public function employee(){
        return $this::hasMany("Employee","company_id","id");
    }

    public function orders(){
        return $this::hasMany("Order","company_id","id");
    }

    public function results(){
        return $this::hasMany("Result","company_id","id");
    }

}
