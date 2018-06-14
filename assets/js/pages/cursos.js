    $(function() {
   
    // Editable
    // ------------------------------


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
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }


    });

   


    // Change defaults
    $.fn.editable.defaults.highlight = false;
    $.fn.editable.defaults.mode = 'popup';
    $.fn.editableform.template = '<form class="editableform">' +
        '<div class="control-group">' +
        '<div class="editable-input"></div><div class="editable-buttons"></div>' +
        '<div class="editable-error-block"></div>' +
        '</div> ' +
        '</form>';
    $.fn.editableform.buttons = 
        '<button type="submit" class="btn btn-info btn-icon editable-submit"><i class="icon-check"></i></button>' +
        '<button type="button" class="btn btn-default btn-icon editable-cancel"><i class="icon-x"></i></button>';


    // Initialize
   

    function editar(){
        $('.edit').editable({
            type:'text',
            url:'core.php?l=actualizar_curso',
            pk: 1,

            success: function(data) {
                if(data == '0'){
                     swal("Actualizado","Registro actualizado correctamente.","success");
                 } else{
                     swal("ERROR","Registro no se a podido actualizar.","error"); 
                }
             }

        });
    }

function tabla(){
   // Datatable with saving state
    $('.datatable-save-state').DataTable({
        stateSave: true
    });



        // Alista la funcion editar
    editar();


        // Carga la funcion cada vez que se le da click
    $( ".dataTables_wrapper" ).click(function() {
         editar();  
    });
}

tabla();






//guardar nuevo curso
$( "#formcursos" ).submit(function( event ) {
  event.preventDefault();
  $.post( "core.php?l=agregar_curso",$( "#formcursos" ).serialize(), function( data ) {
    if (data.error == false) {
       $.post( "core.php?l=RefreshCursos",{tipo:'1'}, function( data ) {
        $('#cursos').html(data.html);
        tabla();
      }, "json" );
      swal("Actualizado","Registro guardado correctamente.","success");
      $( "#formcursos" )[0].reset();
    }else{
      swal("ERROR","Registro no se a podido Guardar.","error");
    }
    
    }, "json" );
});


//eliminar usuario
$(document).on("click", ".eliminar", function (e) {
  e.preventDefault();
    $.post( "core.php?l=eliminar_curso", {"curso":this.value}, function( data ) {
      if(data.error == false){
        swal("Actualizado","Registro eliminado correctamente.","success");
        $.post( "core.php?l=RefreshCursos",{tipo:'1'}, function( data ) {
        $('#cursos').html(data.html);
        tabla();
      }, "json" );
        
      }else{
        swal("ERROR","El registro no se ha eliminado.","error");
      }
    }, "json");
});



     });