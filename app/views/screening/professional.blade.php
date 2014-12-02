<form name="validity" method="post" action="{{ url('form/submit/professionvalidity/'.$screen->id) }}" id="FileUploader"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>

                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-info">Academic Qualification for {{ $screen->employee->firstname }} {{ $screen->employee->lastname }} from {{ $screen->employee->company->name }}</h3>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h3 class="text-info"> Qualification Checks</h3>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-9">
                        <input name="btnAdpname" type="button" class="btn-primary pull-right" id="btnAdpname" value="Add Qualification Establishment"
                               onclick="addRowElement1();"/>
                    </div>
                </div>
                <div class="adding">
                    <div class="oneitem">
                        <div class="col-sm-12">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="establishments">
                                <tr>
                                    <td>


                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="establish_name[]">Establish Name</label>
                                                <input type="text" value="" class="form-control" name="establish_name[]" id="establish_name[]"/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="establish_name[]">Reference Method</label>
                                                <input type="text" value="" class="form-control" name="referencemethod[]" id="	referencemethod[]"/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="establish_name[]">Date Supplied</label><input type="text" value="" class="form-control" name="dateproduced[]" id="dateproduced[]"/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="checkstudy[]">Did candidate study at this establishment?</label>
                                                <select name="checkstudy[]" id="checkstudy[]" class="form-control">
                                                    <option value="">--Select--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <table class="table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0" id="qualificationstb">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
                                                    <tr>
                                                        <td align="left" valign="top" class="col-sm-4">&nbsp;</td>
                                                        <td align="left" valign="top" class="col-sm-4"><strong>Candidate</strong></td>
                                                        <td align="left" valign="top" class="col-sm-4"><strong>Reference</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">Attendence Date</td>
                                                        <td align="left" valign="top"><input type="text" name="candidate_adate[]" id="candidate_adate[]" class="form-control" /></td>
                                                        <td align="left" valign="top"><input type="text" name="reference_adate[]" id="reference_adate[]" class="form-control"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">Name of course(s) studied</td>
                                                        <td align="left" valign="top"><input type="text" name="candidate_course[]" id="candidate_course[]" class="form-control"/></td>
                                                        <td align="left" valign="top"><input type="text" name="reference_course[]" id="reference_course[]" class="form-control" /></td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <br>
                                                    Qualification Check - System Score
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="qualiscore[]" id="qualiscore[]" class="form-control">
                                                        <option value="1" style="background-color: #008000">Good</option>
                                                        <option value="2" style="background-color: orange">Normal</option>
                                                        <option value="3" style="background-color: red">Bad</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
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
        var htm = $(".oneitem").html();
        $(".adding").append("<hr>"+htm);
    }


    function addRowElement2()
    {
        var table = document.getElementById('qualificationstb');
        var row = table.insertRow(-1);

        var cell = row.insertCell(0);

        cell.innerHTML = "<div class='row'><div class='form-group'><table width='100%' border='0' cellspacing='0' cellpadding='0' id='qualificationstb'><tr><td><div class='row'><div class='form-group'><div class='col-sm-5'><span><h4>Did candidate study at this establishment?</h4></span></div><div class='col-sm-2'><select name='checkstudy[]' id='checkstudy[]' class='form-control'><option value=''>--Select--</option><option>Yes</option><option>No</option></select></div></div><div class='form-group'><div class='col-sm-12'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='table table-bordered'><tr><td align='left' valign='top' class='col-sm-4'>&nbsp;</td><td align='left' valign='top' class='col-sm-4'><strong>Candidate</strong></td><td align='left' valign='top' class='col-sm-4'><strong>Reference</strong></td></tr><tr><td align='left' valign='top'>Attendence Date</td><td align='left' valign='top'><label for='candidate_adate[]'></label><input type='text' name='candidate_adate[]' id='candidate_adate[]' class='form-control' /></td><td align='left' valign='top'><input type='text' name='reference_adate[]' id='reference_adate[]' class='form-control'/></td></tr><tr><td align='left' valign='top'>Name of course(s) studied</td><td align='left' valign='top'><input type='text' name='candidate_course[]' id='candidate_course[]' class='form-control'/></td><td align='left' valign='top'><input type='text' name='reference_course[]' id='reference_course[]' class='form-control' /></td></tr><tr><td align='left' valign='top'>Qualification and grade awaded</td><td align='left' valign='top'><input type='text' name='candidate_grade[]' id='candidate_grade[]' class='form-control' /></td><td align='left' valign='top'><input type='text' name='reference_grade[]' id='reference_grade[]' class='form-control' /></td></tr></table></div></div></div><div class='row'><div class='col-sm-12'><div class='form-group'></div></div></div></td></tr></table></div></div>";
    }

</script>
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