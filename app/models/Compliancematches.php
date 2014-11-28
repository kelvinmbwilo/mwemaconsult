	<?php

class Compliancematches extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compliance_matches';

    protected $guarded = array("id");

    public function getcompliance(){
        return $this::belongsTo("Compliance","id","complianceid");
    }

    
}