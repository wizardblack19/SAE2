    $(function() {
   
    // Editable
    // ------------------------------


    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
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
            url:'core.php?l=verdocentes',
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





//guardar nuevo usuario
$( "#formuser" ).submit(function( event ) {
  event.preventDefault();
  $.post( "core.php?l=guardar_user",$( "#formuser" ).serialize(), function( data ) {
    if (data.error == false) {
       $.post( "core.php?l=RefreshUser",{tipo:'1',tabla:'usuarios'}, function( data ) {
        $('#docentes').html(data.html);
        tabla();
      }, "json" );
      swal("Actualizado","Registro guardado correctamente.","success");
      $( "#formuser" )[0].reset();
    }else{
      swal("ERROR","Registro no se a podido Guardar.","error");
    }
    
    }, "json" );


    
});





//desactivar usuario
$(document).on("click", ".cambiar", function (e) {
  e.preventDefault();
  $elemento= this;
    $.post( "core.php?l=desactivar_docente", {"usuario":this.value}, function( data ) {
      if(data.error==false){
        $.post( "core.php?l=RefreshUser",{tipo:'1',tabla:'usuarios'}, function( data ) {
        $('#docentes').html(data.html);
        tabla();
      }, "json" );
      }else{
        alert('Ocurrio un error');
      }
       
    }, "json");
      
});



//eliminar usuario
$(document).on("click", ".eliminar", function (e) {
  e.preventDefault();
    $.post( "core.php?l=eliminar_docente", {"usuario":this.value}, function( data ) {
      if(data.error == false){
        swal("Actualizado","Registro eliminado correctamente.","success");
        $.post( "core.php?l=RefreshUser",{tipo:'1',tabla:'usuarios'}, function( data ) {
        $('#docentes').html(data.html);
        tabla();
      }, "json" );
        
      }else{
        swal("ERROR","El registro no se ha eliminado.","error");
      }
    }, "json");
});

//desabilitar todos los usuarios
$(document).on("click", "#bloquear", function (e) {
  e.preventDefault();
  swal({
  title: "Desea actualizar?",
  text: "Esta a punto de modificar la contraseña de todos los usuarios en esta tabla!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, modificar!",
  closeOnConfirm: false
  },
   
  function(){
    $.post( "core.php?l=bloquear_docentes", {"tipo": 1}, function( data ) {
      if(data.error == false){
        $.post( "core.php?l=RefreshUser",{tipo:'1',tabla:'usuarios'}, function( data ) {
        $('#docentes').html(data.html);
        tabla();
      }, "json" );
        swal("Actualizado","Registros actualizados correctamente.","success");
      }else{
        swal("ERROR","Los registros no se han actualizado","error");
      }
    }, "json");
  });

}); 













     });


