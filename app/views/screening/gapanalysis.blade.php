<form name="validity" method="post" action="{{ url('form/submit/gapvalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Employment Gap Analysis for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
           </div>
        </div>
        
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Gap in Employment history</h3>
           </div>
        </div>
        <div class="row">
           <div class="form-group">
              <div class="col-sm-12">
               
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php 
			    if(count($screen->employeehistory->historydates)==0)
				{
					echo "No employement record found";
				}
				else
				{
			   ?>
                {{foreach($screen->employeehistory->historydates as $ehist }}
                  <tr>
                    <td class="col-sm-6">
					<?php strtotime(candidate_edate) -strtotime($ehist->candidate_sdate)  ?></td>
                    <td class="col-sm-6">Comments</td>
                  </tr>
                {{@endforeach}}
                <?php }?>
                  <tr>
                    <td class="col-sm-6"><label for="eperiod"></label>
                    <input type="text" name="eperiod[]" id="eperiod"  class="form-control"/></td>
                    <td class="col-sm-6"><label for="egcomments"></label>
                    <input type="text" name="egcomments[]" id="egcomments" class="form-control"/></td>
                  </tr>
                
                </table>
              </div>
          </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Gap in Employment history - System Score
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="gapscore" value="1" required="required"><span style="background-color: #91CF4F">Good</span> </label>
                </div>

                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="gapscore" value="2" required="required"><span style="background-color: #FFBF00">Midium</span> </label>
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="gapscore" value="3" required="required"><span style="background-color: red">Risk</span> </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="coments">Comments</label>
                  <textarea name="coments" rows="5" class="form-control"></textarea>
                </div>
            <div class="form-group">
                <div class="col-sm-1">
                 <input type="submit" value="Save" class="btn btn-primary" />
                
                </div>
                 <div class="col-sm-1">
               
                 <input type="reset" value="Reset" class="btn btn-info" />
                </div>
               
           </div>
      </div>
        </td>
        </tr>
        </table>
        
</form>

