<form >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         

        
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Employment history and references</h3>
           </div>
        </div>
        <div class="row">
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="empl1">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Employment history" 
               onclick="addRowElement1();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="organisation[]">Organisation</label>
                    <input type="text" value="" class="form-control" name="organisation[]" id="organisation[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="organisation[]">Reference Method</label>
                    <input type="text" value="" class="form-control" name="rmethod[]" id="rmethod[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="organisation[]">Date Produced</label>
                    <input type="text" value="" class="form-control" name="dateproduced[]" id="dateproduced[]"/>
                    </div>
                    <div class="col-sm-2">
                    <label for="imgattach[]">Image Attached</label>
                    <select name="imgattach[]" id="imgattach[]" class="form-control">
                      <option value="">--Select--</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                    </div>
              </div>
            </div>
                 </td>
               </tr>
             </table>
           </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Employment history and references - System Score
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
           <div class="col-sm-12"> 
             <h3 class="text-info">Job Role Confirmation</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="emp2">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Job Role Confirmation" 
               onclick="addRowElement2();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="organisation[]">Organisation</label>
                    <input type="text" value="" class="form-control" name="jorganisation[]" id="jorganisation[]"/>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Position Held</label>
                    <input type="text" value="" class="form-control" name="jposition[]" id="jposition[]"/>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Reference</label>
                    <input type="text" value="" class="form-control" name="jrefence[]" id="jrefence[]"/>
                    </div>
                    
              </div>
            </div>
                 </td>
               </tr>
             </table>
           </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Job Role Confirmation - System Score
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
           <div class="col-sm-12"> 
             <h3 class="text-info">Confirmation of Employement Date</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="emp3">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-8">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Confirmation of Employement Date" 
               onclick="addRowElement3();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="organisation[]">Organisation</label>
                    <input type="text" value="" class="form-control" name="corganisation[]" id="corganisation[]"/>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Employement Start Date</label>
                        <div class="row">
                           <div class="col-sm-6">
                            <label for="organisation[]">Candidate</label>
                            <input type="text" value="" class="form-control" name="candidate_sdate[]" id="candidate_sdate[]"/>
                           </div>
                           <div class="col-sm-6">
                            <label for="organisation[]">Referee</label>
                            <input type="text" value="" class="form-control" name="referee_sdate[]" id="referee_sdate[]"/>
                           </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Employement End Date</label>
                        <div class="row">
                           <div class="col-sm-6">
                            <label for="organisation[]">Candidate</label>
                            <input type="text" value="" class="form-control" name="candidate_edate[]" id="candidate_edate[]"/>
                           </div>
                           <div class="col-sm-6">
                            <label for="organisation[]">Referee</label>
                            <input type="text" value="" class="form-control" name="referee_edate[]" id="referee_edate[]"/>
                           </div>
                        </div>
                    </div>
                    
              </div>
            </div>
                 </td>
               </tr>
             </table>
           </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Confirmation of Employement Date - System Score
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
<script language="javascript" type="text/javascript">
function addRowElement1()
{
	var table = document.getElementById('');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-4'><label for='organisation[]'>Organisation</label><input type='text' value='' class='form-control' name='organisation[]' id='organisation[]'/></div><div class='col-sm-3'><label for='organisation[]'>Reference Method</label><input type='text' value='' class='form-control' name='rmethod[]' id='rmethod[]'/></div><div class='col-sm-3'><label for='organisation[]'>Date Produced</label><input type='text' value='' class='form-control' name='dateproduced[]' id='dateproduced[]'/></div><div class='col-sm-2'><label for='imgattach[]'>Image Attached</label><select name='imgattach[]' id='imgattach[]' class='form-control'><option value=''>--Select--</option><option>Yes</option><option>No</option></select></div></div></div>";	
}


function addRowElement2()
{
	var table = document.getElementById('');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class=row><div class=form-group><div class=col-sm-4><label for=organisation[]>Organisation</label><input type=text value= class=form-control name=jorganisation[] id=jorganisation[]/></div><div class=col-sm-4><label for=organisation[]>Position Held</label><input type=text value= class=form-control name=jposition[] id=jposition[]/></div><div class=col-sm-4><label for=organisation[]>Reference</label><input type=text value= class=form-control name=jrefence[] id=jrefence[]/></div></div></div></td></tr></table></div></div>";	
}
function addRowElement3()
{
	var table = document.getElementById('');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-4'><label for='organisation[]'>Organisation</label><input type='text' value='' class='form-control' name='corganisation[]' id='corganisation[]'/></div><div class='col-sm-4'><label for='organisation[]'>Employement Start Date</label><div class='row'><div class='col-sm-6'><label for='organisation[]'>Candidate</label><input type='text' value='' class='form-control' name='candidate_sdate[]' id='candidate_sdate[]'/></div><div class='col-sm-6'><label for='organisation[]'>Referee</label><input type='text' value='' class='form-control' name='referee_sdate[]' id='referee_sdate[]'/></div></div></div><div class='col-sm-4'><label for='organisation[]'>Employement End Date</label><div class='row'><div class='col-sm-6'><label for='organisation[]'>Candidate</label><input type='text' value='' class='form-control' name='candidate_edate[]' id='candidate_edate[]'/></div><div class='col-sm-6'><label for='organisation[]'>Referee</label><input type='text' value='' class='form-control' name='referee_edate[]' id='referee_edate[]'/></div></div></div></div></div></td></tr></table></div></div>";	
}
</script>