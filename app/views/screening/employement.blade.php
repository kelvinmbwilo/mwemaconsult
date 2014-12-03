<form name="validity" method="post" action="{{ url('form/submit/emplvalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Employment history and references</h3>
           </div>
        </div>
      <div class="row">
          <div class="col-sm-2 col-sm-offset-10">
              <input name="btnAdpname" type="button" class="btn-xs btn btn-primary" id="btnAdpname" value="Add Another"
                     onclick="addRowElement1();"/>
          </div>
      </div>
          <div id="adding">
        <div class="row" id="toadd">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="employementhistory">
               <tr>
                 <td>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="organisation[]">Organisation</label>
                    <input type="text" value="" class="form-control" name="organisation[]" id="organisation[]"/>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Reference Method</label>
                    <input type="text" value="" class="form-control" name="referencemethod[]" id="referencemethod[]"/>
                    </div>
                    <div class="col-sm-4">
                    <label for="organisation[]">Date Produced</label>
                    <input type="text" value="" class="form-control dates" name="dateproduced[]" id="dateproduced[]"/>
                    </div>

              </div>

                <div class="form-group">

                    <div class="col-sm-12">
                        <h4>Position Held</h4>
                        <div class="form-group">
                            <div class="col-sm-6" style="padding-left: 0px">
                                <label for="organisation[]">Candidate</label>
                                <input type="text" value="" class="form-control" name="cpositionheld[]" id="cpositionheld[]"/>
                            </div>
                            <div class="col-sm-6" style="padding-right: 0px">
                                <label for="rposition[]">Referee</label>
                                <input type="text" value="" class="form-control" name="rposition[]" id="rposition[]"/>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-group">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="EmployementDate">
                        <tr>
                            <td>
                                <div class="form-group">
                                        <div class="col-sm-6">
                                            <label for="organisation[]">Employement Start Date</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="organisation[]">Candidate</label>
                                                    <input type="text"  value="" class="form-control dates" name="candidate_sdate[]" id="candidate_sdate[]"/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="organisation[]">Referee</label>
                                                    <input type="text" value="" class="form-control dates" name="referee_sdate[]" id="referee_sdate[]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="organisation[]">Employement End Date</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="organisation[]">Candidate</label>
                                                    <input type="text" value="" class="form-control dates" name="candidate_edate[]" id="candidate_edate[]"/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="organisation[]">Referee</label>
                                                    <input type="text" value="" class="form-control dates" name="referee_edate[]" id="referee_edate[]"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
                 </td>
               </tr>
             </table>

               <div class="row">
                   <div class="form-group">
                       <div class="col-sm-4">
                           <br>
                           Employment history and references - System Score
                       </div>
                       <div class="col-sm-2">
                           <select name="historyscore[]" id="historyscore[]" class="form-control">
                               <option value="1" style="background-color: #008000">Good</option>
                               <option value="2" style="background-color: orange">Normal</option>
                               <option value="3" style="background-color: red">Bad</option>
                           </select>
                       </div>
                   </div>
               </div>
           </div>
        </div>
              </div>
        <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="coments">Comments</label>
                  <textarea name="coments" rows="5" class="form-control" required="required"></textarea>
                </div>
            <div class="form-group">
                <div class="col-sm-1">
                 <input type="submit" value="Save" class="btn btn-primary" />
                
                </div>
                
               
           </div>
      </div>
       </div>
                <div id="output" class="col-sm-12"></div>
      </div>
        </td>
        </tr>
        </table>
        
</form>
<script language="javascript" type="text/javascript">
function addRowElement1()
{
	var htm = $("#toadd").html();
    $("#adding").append("<hr>"+htm);
}


function addRowElement2()
{
	var table = document.getElementById('joConfirmation');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-4'><label for='organisation[]'>Organisation</label><input type='text' value='' class='form-control' name='jooganisation[]' id='jooganisation[]'/></div><div class='col-sm-8'><label for='organisation[]'>Position Held</label><div class='form-group'><div class='col-sm-6'><label for='organisation[]'>Candidate</label><input type='text' value='' class='form-control' name='cpositionheld[]' id='cpositionheld[]'/></div><div class='col-sm-6'><label for='rposition[]'>Referee</label><input type='text' value='' class='form-control' name='rposition[]' id='rposition[]'/></div></div></div></div></div>";

}
function addRowElement3()
{
	var table = document.getElementById('EmployementDate');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-4'><label for='organisation[]'>Organisation</label><input type='text' value='' class='form-control' name='edoganisation[]' id='edoganisation[]'/></div><div class='col-sm-4'><label for='organisation[]'>Employement Start Date</label><div class='row'><div class='col-sm-6'><label for='organisation[]'>Candidate</label><input type='text' value='' class='form-control  dates' name='candidate_sdate[]' id='candidate_sdate[]'/></div><div class='col-sm-6'><label for='organisation[]'>Referee</label><input type='text' value='' class='form-control dates' name='referee_sdate[]' id='referee_sdate[]'/></div></div></div><div class='col-sm-4'><label for='organisation[]'>Employement End Date</label><div class='row'><div class='col-sm-6'><label for='organisation[]'>Candidate</label><input type='text' value='' class='form-control dates' name='candidate_edate[]' id='candidate_edate[]'/></div><div class='col-sm-6'><label for='organisation[]'>Referee</label><input type='text' value='' class='form-control dates' name='referee_edate[]' id='referee_edate[]'/></div></div></div></div></div>";

}
</script>
<script>
    $(document).ready(function (){
        $('input').addClass('input-xs')
        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });


        function afterSuccess(){
            setTimeout(function() {
                $("#myModal").modal("hide");
            }, 3000);
        }
    });
</script>