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

     });


$(document).on("click", ".cambiar", function () {
    alert(this.value);
     $.ajax({
      type: 'post',
      url: 'core.php',
      data: {"usuario":this.value, "l":"desactiar_docente"}
     }).done(function(data) {
      // Optionally alert the user of success here...
     }).fail(function(data) {
      // Optionally alert the user of an error here...
     });

});
