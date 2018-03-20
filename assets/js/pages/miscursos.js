/* ------------------------------------------------------------------------------
*
*  # Datatables API
*
*  Specific JS code additions for datatable_api.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

 
    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Individual column searching with text inputs
    $('.datatable-column-search-selects tfoot td').not(':last-child').each(function () {
        var title = $('.datatable-column-search-selects thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="Search '+title+'" />');
    });
    var table = $('.datatable-column-search-selects').DataTable();
    table.columns().every( function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            that.search(this.value).draw();
        });
    });

    $('.datatable-column-search-selects tbody').on('click', 'tr', function() {
        $(this).toggleClass('success');
    });


    // External table additions
    // ------------------------------

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    // Enable Select2 select for individual column searching
    $('.filter-select').select2();
    
});
