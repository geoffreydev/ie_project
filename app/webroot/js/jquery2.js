$(document).ready(function ()
{
	$('#data').dataTable( 
	{
		"bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
	});
});