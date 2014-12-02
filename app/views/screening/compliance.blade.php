<form name="validity" method="post" action="{{ url('form/submit/compvalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="#FileUploader">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Compliance Database Check for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
           </div>
        </div>
        
         <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Names Checked</h3>
           </div>
        </div>
        <div class="row">
          <div class="form-group">
              <div class="col-sm-2">
              <label for="searchteam">Search Team(s) Entered</label>
              <input type="text" required="" value="" class="form-control"  name="searchteam" id="searchteam" />
              </div>
            <div class="col-sm-2">
              <label for="datesearch"><label>Date of Search</label>
              <input type="text" required="" value="" class="form-control dates"  name="datesearch"/>
              </div>
              <div class="col-sm-3">
              <label for="totalmatches"><label>Total Matches on search Term</label>
              <input type="text" required="" value="" class="form-control"  name="totalmatches" id="totalmatches"/>
              </div>
              <div class="col-sm-2"> <label>Match Qualified Out</label>
                <input type="text" required="" value="" class="form-control"  name="matchesqualified" id="matchesqualified"/>
              </div>
            <div class="col-sm-3">Possible Match on Your Candidate
                <input type="text" required="" value="" class="form-control"  name="possiblematches" id="possiblematches"/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="col-sm-4">
                    <br>
                  Name Check Validation - System Score
              </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="namescore" value="1" required="required"><span style="background-color: #91CF4F">Good</span> </label>
                </div>

                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="namescore" value="2" required="required"><span style="background-color: #FFBF00">Midium</span> </label>
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="namescore" value="3" required="required"><span style="background-color: red">Risk</span> </label>
                </div>
           </div>
         </div>
        </div>
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Matches Qualified Out</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="Qualifiedtb">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-9">
                   <input name="btnAdpname" type="button" class="btn btn-xs btn-primary" id="btnAdpname" value="Add Another"
               onclick="addRowElement1();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-3">
                    <label for="namemarch">Name matched on</label>
                    <input type="text" value="" class="form-control" name="namematchedon[]" id="namematchedon[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pissuingentity[]">I</label>ssuing 
                    Entity / Country
                    <input type="text" value="" class="form-control" name="issuingentity[]" id="issuingentity[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pextract[]">Type</label>
                    <input type="text" value="" class="form-control" name="type[]" id="type[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pextract[]">Reson Qualified</label>
                    <input type="text" value="" class="form-control" name="reason[]" id="reason[]"/>
                    </div>
                    
              </div>
            </div>
                 </td>
               </tr>
             </table>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Posible Matches on Your Candidate</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="Matchescandidate">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-9">
                   <input name="btnAdpname" type="button" class="btn btn-xs btn-primary" id="btnAdpname" value="Add Another"
               onclick="addRowElement2();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-3">
                    <label for="namemarch">Name matched on</label>
                    <input type="text" value="" class="form-control" name="pnamematchedon[]" id="pnamematchedon[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pissuingentity[]">I</label>ssuing 
                    Entity / Country
                    <input type="text" value="" class="form-control" name="pissuingentity[]" id="pissuingentity[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pextract[]">Type</label>
                    <input type="text" value="" class="form-control" name="ptype[]" id="ptype[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="pextract[]">Extract</label>
                    <input type="text" value="" class="form-control" name="pextract[]" id="pextract[]"/>
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
                 <div class="col-sm-1"></div>
               
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
	var table = document.getElementById('Qualifiedtb');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-3'><label for='namemarch'>Name matched on</label><input type='text' value='' class='form-control' name='namematchedon[]' id='namematchedon[]'/></div><div class='col-sm-3'><label for='pissuingentity[]'>I</label>ssuing Entity / Country<input type='text' value='' class='form-control' name='issuingentity[]' id='issuingentity[]'/></div><div class='col-sm-3'><label for='pextract[]'>Type</label><input type='text' value='' class='form-control' name='type[]' id='type[]'/></div><div class='col-sm-3'><label for='pextract[]'>Reson Qualified</label><input type='text' value='' class='form-control' name='reason[]' id='reason[]'/></div></div></div>";	
}


function addRowElement2()
{
	var table = document.getElementById('Matchescandidate');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-3'><label for='namemarch'>Name matched on</label><input type='text' value='' class='form-control' name='pnamematchedon[]' id='pnamematchedon[]'/></div><div class='col-sm-3'><label for='pissuingentity[]'>I</label>ssuing Entity / Country<input type='text' value='' class='form-control' name='pissuingentity[]' id='pissuingentity[]'/></div><div class='col-sm-3'><label for='pextract[]'>Type</label><input type='text' value='' class='form-control' name='ptype[]' id='ptype[]'/></div><div class='col-sm-3'><label for='pextract[]'>Extract</label><input type='text' value='' class='form-control' name='pextract[]' id='pextract[]'/></div></div></div>";	
}

</script>
<script>
    $(document).ready(function (){
        $(".dates").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:<?php echo date("Y") ?>",
            dateFormat:"yy-mm-dd"
        });
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
