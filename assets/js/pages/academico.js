$(function() {


    $(document).on( "click",".modal_op", function() {
    	let tipo = $(this).attr('tipo');
		$("#m_tipo").html(tipo);

    	if(tipo == 'jornada'){
    		

    	}
    	$("#_config").modal('show');


    	console.log(tipo);
    	/*
        $.post( "core.php?l=editFileForm", { codigo:idb,titulo:titulo,anterior:anterior}, function(data){
            $('#mensaje').html(''); 
            $("#editFileForm").html(data.html);
            $("#boton").html('<button type="button" class="btn btn-warning"> Actualizar</button>');
            $('#editar').modal(); 
            var fileExtension = "";
            $('input[name=archivo]').change(function(){
                var file = $("#imagen")[0].files[0];
                var fileName = file.name;
                fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
                var fileSize = file.size;
                var fileType = file.type;
                $('#mensaje').html("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
            });
            $(".file-styled").uniform({
                fileButtonClass: 'action btn btn-default'
            });
       }, "json");*/

    });    


    $(document).on( "click",".bg-teal", function() {
    	let cuantos = $('#cuantos').val();
    	$('#tabla').html('Vamos bien'+cuantos);
    });














});
