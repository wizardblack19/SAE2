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
        $("#rbusqueda").html('<p class="alert">Cargado, espere...</p>');
        $("#rbusqueda").show();
        $.post( "core.php?l=bCurso",$("#bCursos").serialize(), function( data ) {
            $("#rbusqueda").hide();
            $("#rbusqueda").html(data.html);
            $(".asignar").attr('data-seccion',data.seccion);
            $(".asignar").attr('data-maestro',data.docente);
            $("#rbusqueda").show('slow');
        }, "json")
        .fail(function() {
            $("#rbusqueda").hide('fast');
            swal('Ocurrió un error en el scripts o servidor, no hay datos para este grado. ');
        });
    });

    //Asignarme el curso seleccionado /class="success"

    $(document).on('click', '.asignar', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var docente     =       $("#codigo").attr('code');
        var seccion     =       $(this).attr('data-seccion');
        var codigo      =       $(this).attr('data-curso');
        var id          =       $(this).parent().parent();
        var este        =       $(this);
        $.post( "core.php?l=Asignarme",{docente: docente,seccion:seccion,codigo:codigo}, function( data ) {
            if(data.error_code == 1){
                swal("Oh noes!", data.error, "error");
            }else if(data.error_code == 0){
                swal({title: "Buen Trabajo!",text: data.error,type: "success",timer: 2000,showConfirmButton: false});
                id.removeClass( "fila" ).addClass( "success" );
                este.removeClass( "asignar label-info" ).addClass( "desasignar label-danger" );
                este.html('Desasignar');
            }
        }, "json")
        .fail(function() {
            $("#rbusqueda").hide();
            swal("Oh noes!",'Ocurrió un error en el scripts o servidor, no hay datos para este grado. ', "error");
        });
    });

    //desasignar
    $(document).on('click', '.desasignar', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var docente     =       $("#codigo").attr('code');
        var seccion     =       $(this).attr('data-seccion');
        var codigo      =       $(this).attr('data-curso');
        var id          =       $(this).parent().parent();
        var este        =       $(this);
        $.post( "core.php?l=Desasignarme",{docente: docente,seccion:seccion,codigo:codigo}, function( data ) {
            if(data.error_code == 1){
                swal("Oh noes!", data.error, "error");
            }else if(data.error_code == 0){
                swal({title: "Deleted!",text: data.error,type: "warning",timer: 1000,showConfirmButton: false});
                id.removeClass( "success" ).addClass( "fila" );
                este.removeClass( "desasignar label-danger" ).addClass( "asignar label-info" );
                este.html('Asignarme');
            }
        }, "json")
        .fail(function() {
            $("#rbusqueda").hide();
            swal("Oh noes!",'Ocurrió un error en el scripts o servidor, no hay datos para este grado. ', "error");
        });
    });





    $(document).on("click", ".permiso_unidad", function (e) {
        e.preventDefault();
        

            $.post( "core.php?l=cronoForm", { func: "getNameAndTime" }, function( data ) {
                $('#cronoNuevo').html(data.html);
                $('#miscursos').hide('slow');
                $('#cronograma').show('slow');           
            }, "json");





















    });





    $(document).on("click", ".cancelar", function (e) {
        e.preventDefault();
        var ver = $(this).attr('data-show');
        var ocultar = $(this).attr('data-hide');
        $('#'+ver).show('slow');
        $('#'+ocultar).hide('slow');
    });









    
});




$(document).keydown(


    function(e)
    { 

        
        var datos = $(".move:focus").focus().attr('data-id').split('|');
        var id = parseInt(datos['0']);
        var li = parseInt(datos['1']);


        if (e.keyCode == 107 ) {
            e.preventDefault();
            var sig = (id+1);
            $("#C"+sig).focus();
        }else
        
        if (e.keyCode == 13 ) {      
            var sig = (id+li);
            $("#C"+sig).focus();
        }else    
        
        if (e.keyCode == 109) {
            e.preventDefault();
            var sig = (id-1);
            $("#C"+sig).focus();
   
        }else    
        
        if (e.keyCode == 40) {      
            var sig = (id+li);
            $("#C"+sig).focus();
   
        }else    
        
        if (e.keyCode == 38) {      
            var sig = (id-li);
            $("#C"+sig).focus();
   
        }



    }
);