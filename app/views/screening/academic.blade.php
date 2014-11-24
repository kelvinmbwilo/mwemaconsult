<form >
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Academic Qualification</h3>
           </div>
        </div>
        
        
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Qualification Checks</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Qualification Establishment" 
               onclick="addRowElement3();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="organisation">Establish Name</label>
                    <input type="text" value="" class="form-control" name="organisation"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="organisation">Reference Method</label>
                    <input type="text" value="" class="form-control" name="organisation"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="organisation">Date Produced</label>
                    <input type="text" value="" class="form-control" name="organisation"/>
                    </div>
                    <div class="col-sm-2">
                    <label for="imageat">Image Attached</label>
                    <select name="imageat" id="imageat" class="form-control">
                      <option value="">--Select--</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                    </div>
              </div>
            </div>
                 </td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
               </tr>
             </table>
           </div>
        </div>
         <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Qualification</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Qualification" 
               onclick="addRowElement3();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                   <div class="col-sm-5">
                    <span><h4>Did candidate study at this establishment?</h4></span>
                   </div>
                   <div class="col-sm-2">
                     
                     <select name="checkstudy" id="checkstudy" class="form-control">
                       <option value="">--Select--</option>
                       <option>Yes</option>
                       <option>No</option>
                     </select>
                   </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-12">
                   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                     <tr>
                       <td align="left" valign="top" class="col-sm-4">&nbsp;</td>
                       <td align="left" valign="top" class="col-sm-4"><strong>Candidate</strong></td>
                       <td align="left" valign="top" class="col-sm-4"><strong>Reference</strong></td>
                     </tr>
                     <tr>
                       <td align="left" valign="top">Attendence Date</td>
                       <td align="left" valign="top"><label for="attenddate"></label>
                         <input type="text" name="attenddate" id="attenddate" class="form-control" /></td>
                       <td align="left" valign="top"><input type="text" name="attenddate2" id="attenddate2" class="form-control"/></td>
                     </tr>
                     <tr>
                       <td align="left" valign="top">Name of course(s) studied</td>
                       <td align="left" valign="top"><input type="text" name="attenddate3" id="attenddate3" class="form-control"/></td>
                       <td align="left" valign="top"><input type="text" name="attenddate4" id="attenddate4" class="form-control" /></td>
                     </tr>
                     <tr>
                       <td align="left" valign="top">Qualification and grade awaded</td>
                       <td align="left" valign="top"><input type="text" name="attenddate5" id="attenddate5" class="form-control" /></td>
                       <td align="left" valign="top"><input type="text" name="attenddate6" id="attenddate6" class="form-control" /></td>
                     </tr>
                     
                   </table>
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


