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
    public function adversemedia(){
        return $this->hasOne('Adversemedia', 'screen_id', 'id');
    }
    public function employeehistory(){
        return $this->hasMany('Employment', 'screen_id', 'id');
    }
    public function compliance(){
        return $this->hasMany("Compliance",'screen_id','id');
    }
    public function academic(){
        return $this->hasOne('Academic', 'screen_id', 'id');
    }
    public function criminal(){
        return $this->hasOne('Criminal', 'screen_id', 'id');
    }
    public function cvnalysis(){
        return $this->hasOne('Cvnalysis', 'screen_id', 'id');
    }
    public function professional(){
        return $this->hasOne('Professional', 'screen_id', 'id');
    }
    public function gapanalysis(){
        return $this->hasOne('Gapanalysis', 'screen_id', 'id');
    }



}
