<form >
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Adverse Media Check</h3>
           </div>
        </div>
        
         <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Names Checked</h3>
           </div>
        </div>
        <div class="row">
          <div class="form-group">
              <div class="col-sm-3">
              <label for="searchterms">Search Team(s) Entered</label>
              <input type="text" value="" class="form-control"  name="searchterms"/>
              </div>
              <div class="col-sm-3">
              <label for="datesearch">Date of Searche</label>
              <input type="text" value="" class="form-control"  name="datesearch"/>
              </div>
              <div class="col-sm-3">
              <label for="totalmatch">Total Matches on searche Term</label>
              <input type="text" value="" class="form-control"  name="totalmatch"/>
              </div>
              <div class="col-sm-3">
              <label for="matchonly">Matches Only</label>
              <input type="text" value="" class="form-control"  name="matchonly"/>
              </div>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Employment history" 
               onclick="addRowElement3();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="namemarch">Name matched on</label>
                    <input type="text" value="" class="form-control" name="namemarch[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="dob">Age /DOB</label>
                    <input type="text" value="" class="form-control" name="dob"/>
                    </div>
                    <div class="col-sm-5">
                    <label for="extract">Extract</label>
                    <input type="text" value="" class="form-control" name="extract"/>
                    </div>
                    
              </div>
            </div>
                 </td>
               </tr>
             </table>
           </div>
        </div>
        <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="coments">Comments</label>
                  <textarea name="coments" rows="10" class="form-control"></textarea>
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

