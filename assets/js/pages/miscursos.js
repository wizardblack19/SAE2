$(function() {

 
    // Tabla
    // ------------------------------
    function tablaCursos(){
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Buscar:</span> _INPUT_',
            searchPlaceholder: 'Escribe para Buscar...',
            lengthMenu: '<span>Ver:</span> _MENU_',
            paginate: { 'first': 'primero', 'ultimo': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
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
        $(this).html('<input type="text" class="form-control input-sm" placeholder="'+title+'" />');
    });
    var table = $('.datatable-column-search-selects').DataTable({
            stateSave: true,
            dom: '<"datatable-header dt-buttons-right"fB><"datatable-scroll"tS><"datatable-footer"pl>',
            ordering: false,
            buttons: {            
                dom: {
                    button: {
                        className: 'btn btn-default'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }
        });
    table.columns().every( function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            that.search(this.value).draw();
        });
    });
    $('.datatable-column-search-selects tbody').on('click', 'tr', function() {
        $(this).toggleClass('success');
    });

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    // Enable Select2 select for individual column searching
    $('.filter-select').select2();

    }

    //llamado de DataTable
    tablaCursos();

    function post_data(codigo, action, block){
        $(block).block({ 
            message: '<i class="icon-spinner2 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait',
                'box-shadow': '0 0 0 1px #ddd'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

        if(action === undefined){
            window.setTimeout(function () {
               $(block).unblock();
            }, 2000);
        }else{
            $.post( "core.php?l=refreshMisCursos", { codigo: codigo, action:action }, function( data ) {  
                $("#resultado1").html(data.html);
                tablaCursos();
                window.setTimeout(function () {
                   $(block).unblock();
                }, 500);
           }, "json");
        }

    }

    //Ejecutar al cerrar modal // refresh tabla mis cursos
     $("#asignarme").on('hidden.bs.modal', function () {
        var perfil = JSON.parse(Cookies.get('perfil'));
        var action = 'ver';
        var block = '#miscursos';
        post_data(perfil.codigo,action,block);
    });

    //Buscar cursos event submit

    $( "#bCursos" ).submit(function( event ) {
      event.preventDefault();





      
    });



    
});
