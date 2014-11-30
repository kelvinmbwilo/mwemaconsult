<form name="validity" method="post" action="{{ url('form/submit/criminvalidity/'.$screen->id) }}" id="FileUploader">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
         
        <div class="row">
           <div class="col-sm-12"> 
             <h3 class="text-info">Criminal check for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
           </div>
        </div>
        
        <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="coments">Comments</label>
                  <textarea name="coments" rows="10" class="form-control" required="required"></textarea>
                </div>
              </div>
            <div class="form-group">
              <div class="col-sm-4">
                    <br>
                  Criminal Analysis - System Score
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
           <div class="row">
            <div class="form-group">
                <div class="col-sm-12">
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
