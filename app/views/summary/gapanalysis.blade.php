<form name="validity" method="post" action="{{ url('form/submit/gapvalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Employment Gap Analysis</h3>
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
                  <tr>
                    <td class="col-sm-6">Period</td>
                    <td class="col-sm-6">Comments</td>
                  </tr>
                
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
                    <label><input type="radio" name="adresscore" value="1" required="required"><span style="background-color: #91CF4F">Good</span> </label>
                </div>

                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="adresscore" value="2" required="required"><span style="background-color: #FFBF00">Midium</span> </label>
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="adresscore" value="3" required="required"><span style="background-color: red">Risk</span> </label>
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

