	<?php

class Complianceposibles extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compliance_posibles';

    protected $guarded = array("id");

    public function getcompliance(){
        return $this::belongsTo("Compliance","id","complianceid");
    }

    
}