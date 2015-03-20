var myArray = []; // id => html / score / position
var myArrayTwo = []; // pseudo => id

$( document ).ready(function(){

    $('.activity').dataTable({
        "order": [],
        bFilter: false,
        bPaginate: false,
        bLengthChange: false,
        bInfo: false
    });

    // récupération des row à stocker
    $( ".expendables" ).each(function( index ) {

        myArray[index] = {
            name : $(this).attr('id'),
            html : $(this).find('td').html(),
            score : $(this).data('total-points'),
            position : ""
        }
    });

    $(".expendables").remove();

    var i = 1;

    myArray.sort(function(a,b) { return parseFloat(b.score) - parseFloat(a.score) } ).forEach(function(entry) {
        entry.position = i++;
        myArrayTwo[entry.name] = myArray.indexOf(entry);
    });


    // affectation de la position
    $("tr.positionable").each(function(){
        $(this).find(".position").html(myArray[myArrayTwo[$(this).data('name')]]["position"]);
    });

    // génération du DataTable
    var table = $('.datatable').DataTable(
        {
            columnDefs: [{ targets: 'no-sort', orderable: false }],
            order: [],
            bFilter: false,
            bPaginate: false,
            bLengthChange: false,
            bInfo: false
        }
    );

    // génération du DataTable
    var table_mini = $('.datatable-mini').DataTable(
        {
            columnDefs: [{ targets: 'no-sort', orderable: false }],
            order: [[ 0, "asc" ]],
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
            $(this).removeClass('glyphicon-minus-sign').addClass('glyphicon-plus-sign'); // test
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tr.next('tr').removeClass('tr-full');
        }
        else {
            // Open this row
            $(this).removeClass('glyphicon-plus-sign').addClass('glyphicon-minus-sign');
            row.child( myArray[myArrayTwo[$(this).data('name')]]["html"] ).show();
            tr.addClass('shown');
            tr.next('tr').addClass('tr-full');
        }
    });

    
    // activation / desactivation des tr en plus (MINI VERSION)
    $('.expand-mini').on('click touchstart',function(){
        alert('test');
        var tr = $(this).closest('tr');
        var row = table_mini.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tr.next('tr').removeClass('tr-mini');
        }
        else {
            // Open this row
            row.child( myArray[myArrayTwo[$(this).data('name')]]["html"] ).show();
            tr.addClass('shown');
            tr.next('tr').addClass('tr-mini');
        }
    });

});

// Add event listener for opening and closing details
