
<form name="validity" method="post" action="{{ url('form/submit/validity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Identity Check for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Identity Validation</h3>
           </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-3">
                    <label for="candidateidentity">Canditate Identity Validated?</label>

                    <select name="candidateidentity" id="candidateidentity" class="form-control" required="required">
                      <option value="">--Select--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="ConfidenceRating">Confidence Rating</label>

                  <select name="ConfidenceRating" id="ConfidenceRating" class="form-control" required="required">
                      <option value="">--Select--</option>
                      <option value="Low">Low</option>
                      <option value="Medium">Medium</option>
                      <option value="High">High</option>
                  </select>
                </div>
                <div class="col-sm-3">
                     <label for="AliasName">Alias Name found</label>
                    <select name="AliasName" id="AliasName" class="form-control" required="required">
                      <option value="">--Select--</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                </div>
                <div class="col-sm-3">
                   <label for="Mortality">Mortality file match</label>
                    <select name="Mortality" id="Mortality" class="form-control">
                      <option value="">--Select--</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                </div>
           </div>
         </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Identity Validation - System Score
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="validscore" value="1" required="required"><span style="background-color: #91CF4F">Good</span> </label>
                </div>

                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="validscore" value="2" required="required"><span style="background-color: #FFBF00">Midium</span> </label>
                </div>
                <div class="col-sm-2">
                    <br>
                    <label><input type="radio" name="validscore" value="3" required="required"><span style="background-color: red">Risk</span> </label>
                </div>
           </div>
         </div>
        </div>
         <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info"> Address Check </h3>
           </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-7">
                   <label for="addresssuggestion">Does the data suggest the candidate is resident at their current address?</label>
                    <select name="addresssuggestion" id="addresssuggestion" class="form-control">
                      <option value="">--Select--</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                </div>
                <div class="col-sm-5">
                   <label for="validationpiece">How many piece of data support the validation?</label>
                    <input type="text" name="candidateidentity" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <br>
                    Address Check - System Score
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

            <div class="form-group">
              <div class="col-sm-12">
                <label for="coments">Comments</label>
                  <textarea name="coments" rows="5" class="form-control" required="required" placeholder="Write your Observations"></textarea>
                </div>
            <div class="form-group">

                <div class="col-sm-1">
                    <br>
                 <input type="submit" value="Save" class="btn btn-primary" />
                
                </div>
                 <div class="col-sm-1">

                </div>
               
           </div>
                <div id="output" class="col-sm-12"></div>
      </div>

        </td>
        </tr>
        </table>
        
</form>
<script>
    $(document).ready(function (){
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
