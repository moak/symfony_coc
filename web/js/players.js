var myArray = []; // id => html / score / position
var myArrayTwo = []; // pseudo => id

$( document ).ready(function(){

	// récupération des row à stocker
	$( ".expendables" ).each(function( index ) {
		myArray[index] = {
            html : $(this).find('td').html(),
            score : $(this).data('total-points'),
            position : ""
        }
        myArrayTwo[$(this).attr('id')] = index;
	});

    $(".expendables").remove();

    myArray.sort(function(a,b){
        if(a.score > b.score)
            return -1;
        if(a.score < b.score)
            return 1;
        return 0;
    });

    var i = 1;
    myArray.forEach(function(entry) {
        entry.position = i++;
        console.log(entry);
    });

    // affectation de la position
    $("tr.positionable").each(function(){
        $(this).find(".position").html(myArray[myArrayTwo[$(this).data('name')]]["position"]);

    });

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
			row.child( myArray[myArrayTwo[$(this).data('name')]]["html"] ).show();
			tr.addClass('shown');
		}
	});

});

// Add event listener for opening and closing details
