<?php

class Screening extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'screening';

    protected $guarded = array("id");

    public function package(){
        return $this::belongsTo("Package","package_id","id");
    }

    public function result(){
        return $this::hasMany("Result","screen_id","id");
    }

}