{{ HTML::style("js/bootstrap-datepicker/css/datepicker.css") }}
<form name="validity" method="post" action="{{ url('form/submit/advalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Adverse Media Check for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
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
              <input type="text" value="" class="form-control"  name="searchterms" required="required"/>
              </div>
              <div class="col-sm-3">
              <label for="datesearch">Date of Search</label>
              <input type="text" value="" class="form-control dates"  name="datesearch" required="required"/>
              </div>
              <div class="col-sm-3">
              <label for="totalmatch">Total Matches on searche Term</label>
              <input type="text" value="" class="form-control"  name="totalmatch" required="required"/>
              </div>
              <div class="col-sm-3">
              <label for="matchonly">Matches Only</label>
              <input type="text" value="" class="form-control"  name="matchonly" required="required"/>
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
             <h3 class="text-info">Details of Matches</h3>
           </div>
        </div>
        <div class="row">
        
           <div class="form-group">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="adverse">
               <tr>
                 <td>
                 <div class="row">
                 <div class="col-sm-2 col-sm-offset-10">
                   <input name="btnAdpname" type="button" class="btn-primary" id="btnAdpname" value="Add Details" 
               onclick="addRowElement1();"/>
                 </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-sm-4">
                    <label for="namemarch">Name matched on</label>
                    <input type="text" value="" class="form-control" name="namemarch[]"/>
                    </div>
                    <div class="col-sm-3">
                    <label for="dob[]">Age /DOB</label>
                    <input type="text" value="" class="form-control dates" name="dob[]" id="dob[]"/>
                    </div>
                    <div class="col-sm-5">
                    <label for="extract[]">Extract</label>
                    <input type="text" value="" class="form-control" name="extract[]" id="extract[]"/>
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
                
               
           </div>
      </div>
       </div>
                <div id="output" class="col-sm-12"></div>
      </div>

        </td>
        </tr>
        </table>
        
</form>
{{ HTML::script("js/bootstrap-datepicker/js/bootstrap-datepicker.js") }}
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

<script language="javascript" type="text/javascript">
function addRowElement1()
{
	var table = document.getElementById('adverse');
	var row = table.insertRow(-1);
		
	var cell = row.insertCell(0);
	
	cell.innerHTML = "<div class='row'><div class='form-group'><div class='col-sm-4'><label for='namemarch'>Name matched on</label><input type='text' value='' class='form-control' name='namemarch[]'/></div><div class='col-sm-3'><label for='dob[]'>Age /DOB</label><input type='text' value='' class='form-control dates' name='dob[]' id='dob[]'/></div><div class='col-sm-5'><label for='extract[]'>Extract</label><input type='text' value='' class='form-control' name='extract[]' id='extract[]'/></div></div></div>";
    $(".dates").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:<?php echo date("Y") ?>",
        dateFormat:"yy-mm-dd"
    });
}
</script>


