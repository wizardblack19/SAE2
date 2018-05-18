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

    function post_data(codigo, action){
        $.post( "core.php?l=refreshMisCursos", { codigo: codigo, action:action }, function( data ) {  
            $("#resultado1").html(data.html);
            tablaCursos();
       }, "json");
    }

    //Ejecutar al cerrar modal // refresh tabla mis cursos
     $("#asignarme").on('hidden.bs.modal', function () {
        var perfil = JSON.parse(Cookies.get('perfil'));
        var action = 'ver';
        var block = '#miscursos';
        post_data(perfil.codigo,action);
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
        $(this).addClass('disabled');
        if(cargarcookie() == 0){
            swal("Error!", "Debe seleccionar unidad a trabajar!", "error");
        }else{
            e.stopPropagation();
        var result = $(this).attr('data-crono').split('|');
        var docente = $("#codigo").attr('code');
            $.post( "core.php?l=cronoForm", { docente: docente,unidad: cargarcookie(),curso: result[3],seccion: result[2]  }, function( data ) {
                $('#cronoNuevo').html(data.html);
                $('#miscursos').hide('slow');
                $('#cronograma').show('slow');
                $('#curso').html(
                    '<span class="label border-left-info label-striped">'+result[0] + 
                    ' | '+result[1]+
                    ' | sección: '+result[2]+
                    ' | Código: '+result[3]+'</span>');
            }, "json");
    }






    });



    $(document).on("click", ".guardar", function (e) {
        e.preventDefault();
        var estado = $(this).attr('estado');
        $('#estado').val(estado);

        $.post( "core.php?l=SaveIndividualCrono",$("#cronoForm").serialize(), function( data ) {
            
            if(data.alert=="0"){
                swal("Mensaje",data.msg,data.alert);
            }else if(data.alert > "0"){
                $("#id").val(data.idD);
                swal("Mensaje",data.msg,data.alert);
            }


        }, "json");


    });


    $(document).on("click", ".cancelar", function (e) {
        e.preventDefault();
        var perfil = JSON.parse(Cookies.get('perfil'));
        var action = 'ver';
        post_data(perfil.codigo,action);
        var ver = $(this).attr('data-show');
        var ocultar = $(this).attr('data-hide');
        $('#'+ver).show('slow');
        $('#'+ocultar).hide('slow');
    });


    $(document).on("click", ".clonar", function (e) {
        e.preventDefault();
        var codigo = $('#codigo').attr('code');

        $.post( "core.php?l=clonar",{codigo: codigo, tipo:'clonar'}, function( data ) {
            if(data){

                $('#miscursose').html(data.html);
                $('#Copciones').hide('fast');
                $('#cursosA').show('fast');
            }

        }, "json");





    });












    $(document).on("click", ".enlazar", function (e) {
        e.preventDefault();
        $('#Copciones').hide('fast');
        $('#cursosA').show('fast');

    });    


     $("#Clonar").on('hidden.bs.modal', function () {

        $('#Copciones').show();
        $('#cursosA').hide();
    });


    $(document).on("click", ".borrar", function (e) {
        e.preventDefault();
        var idK =   $(this).attr('idK');
        var idD =   $(this).attr('idD');


        swal({ 
         title: "¿Seguro que desea Borrar?", 
         text: "No podrá deshacer este paso...", 
         type: "warning", 
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#DD6B55", 
         confirmButtonText: "Borrar!", 
         closeOnConfirm: false }, 
         function(){ 
             

        $.post( "core.php?l=borrarCrono",{idD:idD, idK:idK,data: 'key'}, function( data ) {
            if(data.msg=="1"){
                var perfil = JSON.parse(Cookies.get('perfil'));
                var action = 'ver';
                post_data(perfil.codigo,action);
                $('#cronograma').hide();
                $('#miscursos').show();
                 swal("¡Hecho!", 
                 "cronograma Borrado.", 
                 "success"); 
            }else{
                swal("Error!", 
                 "Algo raro paso, no fue posible borrar este cronograma.", 
                 "alert"); 
            }

        }, "json");


         });
    });




    
});






$(document).keydown(
    function(e){
    var datos = $(".move:focus").focus().attr('data-id');
    if (typeof datos !== 'undefined') {
    datos = datos.split('|');
        var id = parseInt(datos['0']);
        var li = parseInt(datos['1']);

        if (e.keyCode == 107 ) {
            e.preventDefault();
            var sig = (id+1);
            $("#C"+sig).focus();
        }else if (e.keyCode == 13 ) {      
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



    }
);