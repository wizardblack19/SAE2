$(function() {
	

 $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 2 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filtro:</span> _INPUT_',
            searchPlaceholder: 'Filtrar...',
            lengthMenu: '<span>Mostrar:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-2).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-2).find('.dropdown, .btn-group').removeClass('dropup');
        }


    });




	$('.opcion').uniform({
         wrapperClass: 'border-info-600 text-info-800'
    });

 




});
