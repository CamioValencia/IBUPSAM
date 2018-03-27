

 src="https://code.jquery.com/jquery-1.12.4.js">
           
   src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> 
                     


$(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );