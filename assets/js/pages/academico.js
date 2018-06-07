$(function() {


    var maxField = 25;
    var wrapper = $('.field_wrapper');
    var fieldHTML = (name) => `
		<div class="input-group">
			<input name=${name} type="text" class="form-control">
			<span inp='${name}' style="cursor: pointer;" class="input-group-addon bg-success add_button"><i class="icon-add"></i></span>
			<span style="cursor: pointer;" class="input-group-addon bg-pink remove_button"><i class="icon-subtract"></i></span>
		</div>`; 


    $(wrapper).on('click', '.add_button', function(e){
 	var x = 0; 
		$( "input[name*='jornada']" ).each(function(){
				x++;
		});
    	let name = $(this).attr('inp');
        if(x < maxField){
            x++;
            $(this).parent().parent('div').append(fieldHTML(name));
        }
    });

    $(wrapper).on('click', '.remove_button', function(e){
    e.preventDefault();   	
	 	var x = 0; 
		$( "input[name*='jornada']" ).each(function(){
				x++;
		});
    	if(x!=1){
	        $(this).parent('div').remove();
	        x--;
    	}
    });
    
    $(document).on("click",".btn_jornada", function() {
		$.post( "core.php?l=save_jornada", $( "#jornadas" ).serialize() , function( data ) {
		  if(!data.error){
		  	console.log('Correcto...');
		  }
		}, "json");
    });

    $(document).on("click",".btn_nivel", function() {
		$.post( "core.php?l=save_nivel", $( "#niveles" ).serialize() , function( data ) {
		  if(!data.error){
		  	console.log('Correcto...');
		  }
		}, "json");

    });

    $(document).on("click",".btn_seccion", function() {
		$.post( "core.php?l=save_seccion", $( "#secciones" ).serialize() , function( data ) {
		  if(!data.error){
		  	console.log('Correcto...');
		  }
		}, "json");

    });


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
