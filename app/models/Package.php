<?php

class Package extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';

    protected $guarded = array("id");

    public function criteria(){
        return $this::hasMany("Screening","package_id","id");
    }

}
