function fnFormatDetails ( oTable, nTr )
{

    var aData = oTable.fnGetData( nTr );
    oTable.fnOpen( nTr, "<i class='fa fa-spin fa-spinner fa-2x'></i> ....", 'details' );
    $.post("../../order/summary/"+aData[1],function(data){

    var sOut = '<table style="width: 100%" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += data;
    sOut += '</table>';
       oTable.fnOpen( nTr, sOut, 'details' );
    })
}

$(document).ready(function() {

    $('#dynamic-table').dataTable( {
        "aaSorting": [[ 5, "desc" ]]
    } );

    $(".report").click(function(){
        var id1 = $(this).parent().attr('id');
        var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        modal+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
        modal+= '<div class="modal-content">';
        modal+= '<div class="modal-header">';
        modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        modal+= '<h4 class="modal-title" id="myModalLabel">Candidate Report</h4>';
        modal+= '</div>';
        modal+= '<div class="modal-body">';
        modal+= ' </div>';
        modal+= '</div>';
        modal+= '</div>';

        $("body").append(modal);
        $("#myModal").modal("show");
        $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
        $(".modal-body").load("../../order/viewsummary/"+id1);
        $("#myModal").on('hidden.bs.modal',function(){
            $("#myModal").remove();
        })
    });

    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="../../../images/open.png" title="click here to view more details">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "../../../images/open.png";
            oTable.fnClose( nTr );
        }
        else
        {
        /* Open this row */
            this.src = "../../../images/less.jpg";
            fnFormatDetails(oTable, nTr);
        }
    } );
} );