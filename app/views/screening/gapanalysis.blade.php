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
                  <div class="row">
                      <div class="col-sm-2 col-sm-offset-9">
                          <input name="btnAdpname" type="button" class="btn btn-xs btn-primary" id="btnAdpname" value="Add Another"
                                 onclick="addRowElement1();"/>
                      </div>
                  </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="gaptable">
                  <tr>
                    <td class="col-sm-6">
					Period</td>
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
            <div id="output" class="col-sm-12"></div>
        </div>
      </td>
        </tr>
        </table>
        
</form>

<script language="javascript" type="text/javascript">
    function addRowElement1()
    {
        var html = '<tr>';
        html += '<td class="col-sm-6"><label for="eperiod"></label>';
        html += '<input type="text" name="eperiod[]" id="eperiod"  class="form-control"/></td>';
        html += '<td class="col-sm-6"><label for="egcomments"></label>';
        html += '<input type="text" name="egcomments[]" id="egcomments" class="form-control"/></td>';
        html += '</tr>';
        $("#gaptable").append(html)
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

