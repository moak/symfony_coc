var myArray = []; // tableau qui contiendra le HTML des row à expand

$( document ).ready(function(){

	// récupération des row à stocker
	$( ".expendables" ).each(function( index ) {
		myArray[$(this).attr('id')] = $(this).html();
		alert($(this).html());
	});
	$(".expendables").remove();
	
	// génération du DataTable
	var table = $('.datatable').DataTable(
		{
			columnDefs: [{ targets: 'no-sort', orderable: false }],
			order: [[ 1, "asc" ]],
			bFilter: false,
			bPaginate: false,
    		bLengthChange: false,
    		bInfo: false
		}
	);
	
	// activation / desactivation des tr en plus
	$( "body" ).on( "click", ".expand", function() {	
		var tr = $(this).closest('tr');
		var row = table.row( tr );
 
		if ( row.child.isShown() ) {
			$(this).removeClass('glyphicon-minus-sign').addClass('glyphicon-plus-sign');
			// This row is already open - close it
			row.child.hide();
			tr.removeClass('shown');
		}
		else {
			// Open this row
			$(this).removeClass('glyphicon-plus-sign').addClass('glyphicon-minus-sign');
			row.child( myArray[$(this).data('name')] ).show();
			tr.addClass('shown');
		}
	});

});

// Add event listener for opening and closing details
