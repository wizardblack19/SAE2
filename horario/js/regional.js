$(document).ready(function(){
    $('#agregarregional').click(function(){

        //Obtenemos el valor del campo nombre
        var pais = $("#Pais").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (pais == "") {
            alertify.error('Debe seleccionar un pais');
            $("#Pais").focus();
            return false;
        }

      
        var depto = $("#Departamento").val();
      
        if (depto == "") {
            alertify.error('Debe seleccionar un departamento');
            $("#Departamento").focus();
            return false;
        }
        var director = $("#Director").val();
       
        if (director == "") {
            alertify.error('Debe Introducir el director de la regional');
            $("#Director").focus();
            return false;
        }
        var nombre = $("#Nombre").val();
      
        if (nombre == "") {
            alertify.error('Debe Introducir un nombre para la regional');
            $("#Nombre").focus();
            return false;
        }


        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
      
        $.ajax({
            type: "GET",
            url: 'funciones/php/RegistrarRegional.php?nombre=' + nombre + '&director=' + director + '&pais=' + pais + '&departamento=' + depto,
            data: 'pais=' + pais,
            success: function (datos) {

                var mensaje = datos[0].mensajeError;

                if (mensaje == 1) {
                    alert("LA REGIONAL QUE INTENTA REGISTRAR YA EXISTE");
                    return false;
                }

                $('#ModalRegistroRegional').modal('hide');
                alert('Regional Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('.table').load("funciones/php/tablaRegional.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                //Limpiamos los Input
            }
        }); 
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
			// Javascript method's body can be found in assets/js/demos.js
    $("#region").addClass("active");

    var pais;
    id =$('#inpID').val();
    pais =$('#inpPais').val();
    dpto =$('#inpDepartamento').val();
    director=$('#inpDirector').val();
    nombre =$('#inpNombre').val();
    

    if(pais)
    {   $("#IDRegional").val(id);
        $("#Pais option[value='"+pais+"']").attr('selected', true);
        $("#Departamento option[value='"+dpto+"']").attr('selected', true);
        $("#Director").val(director);
        $("#Nombre").val(nombre);

        $('#agregarregional').removeClass('ver');
        $('#agregarregional').addClass('nover');

        $('#ActualizarRegional').removeClass('nover');
        $('#ActualizarRegional').addClass('ver');

        $('#ModalRegistroRegional').modal('toggle');
        $('#ModalRegistroRegional').modal('show');
    }

    $('#ActualizarRegional').click(function(){
    
        id      =$("#IDRegional").val();
        pais    =$("#Pais").val();
        dpto    =$("#Departamento").val();
        director=$("#Director").val();
        nombre  =$("#Nombre").val();

        $.ajax({
                type:'GET',
                url:'Funciones/php/Actualizar.php?idRegional='+id+'&Pais='+pais+'&Dpto='+dpto+'&Director='+director+'&Nombre='+nombre,
                data:'id='+id,
                success: function(x)
                {   
                    if(x=="1")
                    {
                        alert("Regional actualizada correctamente!");
                        $('.table').load('funciones/php/tablaRegional.php');
                        return false;

                    }
                    else
                    {
                        alert("Regional no actualizo correctamente !");
                        return false;     
                    }
                }
        });


    });

    $('#btnRegistrarRegional').click(function(){


        $('#agregarregional').removeClass('nover');
        $('#agregarregional').addClass('ver');

        $('#ActualizarRegional').removeClass('ver');
        $('#ActualizarRegional').addClass('nover');
        

    });

		});
		