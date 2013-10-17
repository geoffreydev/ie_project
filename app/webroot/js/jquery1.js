$(document).ready(function ()
{
	$( '#data tbody tr:even').addClass("listeven");
	
	$('#data tbody tr').mouseover(function () 
	{ 
		$(this).addClass('dataHover'); 
	});
	$('#data tbody tr').mouseout(function () 
	{ 
		$(this).removeClass('dataHover'); 
	});
});