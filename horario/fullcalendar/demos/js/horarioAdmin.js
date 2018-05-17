	$(document).ready(function(){
		$('#Instructor').removeAttr("disabled");
	$("#printpdf").click(function(){

		//ACA OCULTO LAS OPCIONES ARRIBA DEL HORARIO
		$('.FILA').addClass("nover");
		  $(".fc-event-container").css("font-size", "20px");
		Imprimir($('<div/>').append($('#calendar').clone()).html());
		
	function Imprimir(data) 
	{

		if($('#CheckPorFichas').prop('checked'))
		{
				var Var = $('#SelectFichas option:selected').html();
		}
		if($('#CheckPorInstructor').prop('checked'))
		{
			var Var = $('#SelectInstructor option:selected').html();
			Var="INSTRUCTOR: "+Var;
		}

		var mywindow = window.open('', 'my div', 'height=400,width=700');
	    mywindow.document.write('<html><head><title>HORARIO EN PDF DE '+Var+'</title>');
	    mywindow.document.write('<link rel="stylesheet" href="css/fullcalendar.css" type="text/css" />');
	    mywindow.document.write('</head><body >');
	    mywindow.document.write(data);
	    mywindow.document.write('</body></html>');

	  		
	  		return true;
	}
  		//ACA VUELVO A MOSTRAR LAS OPCIONES LUEGO DE EXPORTAR A PDF

	  	$('.FILA').removeClass("nover");		
	});

		 $.ajax({
				type: "POST",
				url: 'php/mostrarTrimestre.php',
				data: 'inicioP=s',
				success: function(datos)
				  {      
				  	//====MOSTRAR FECHA DE INICIO DEL PRIMER TRIMESTRE=========

				  	var dato= datos[0].inicio; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#inicioPrimero').val(fecha+'T'+hora);

					//====MOSTRAR FECHA FIN DEL PRIMER TRIMESTRE=========

					var dato= datos[0].fin; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#finPrimero').val(fecha+'T'+hora);

					//====MOSTRAR FECHA INICIO DEL SEGUNDO TRIMESTRE=========

					var dato= datos[1].inicio; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#inicioSegundo').val(fecha+'T'+hora);

					//====MOSTRAR FECHA FIN DEL SEGUNDO TRIMESTRE=========

					var dato= datos[1].fin; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#finSegundo').val(fecha+'T'+hora);

					//====MOSTRAR FECHA INICIO DEL TERCER TRIMESTRE=========

					var dato= datos[2].inicio; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#inicioTercer').val(fecha+'T'+hora);

					//====MOSTRAR FECHA FIN DEL TERCER TRIMESTRE=========

					var dato= datos[2].fin; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#finTercer').val(fecha+'T'+hora);

					//====MOSTRAR FECHA INICIO DEL CUARTO TRIMESTRE=========

					var dato= datos[3].inicio; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); // mostrar la fecha con formato YYYY-MM-DD
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#inicioCuarto').val(fecha+'T'+hora);

					//====MOSTRAR FECHA FIN DEL TERCER TRIMESTRE=========

					var dato= datos[3].fin; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
				  	var fecha = moment(dato, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
				  	fecha = fecha.format('YYYY-MM-DD'); //
				
				   	var dt = new Date(dato); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

					var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
				  	var hora = moment(time,'hh:mm');
				  	hora = hora.format('HH:mm');				 
					$('#finCuarto').val(fecha+'T'+hora);

				
				   } //fin del SUCCESS
   		 }); //FIN DEL AJAX

	
		$('#Actualizar').click(function(){

			var iniciop =$('#inicioPrimero').val();
			var inicios =$('#inicioSegundo').val();
			var iniciot =$('#inicioTercer').val();
			var inicioc =$('#inicioCuarto').val();

			var finp 	=$('#finPrimero').val();
			var fins 	=$('#finSegundo').val();	
			var fint 	=$('#finTercer').val();	
			var finc 	=$('#finCuarto').val();

			if (iniciop>=inicios) {
			
				alertify.error('El primer trimestre no puede iniciar al mismo tiempo o despues que inicia el segundo trimestre'); //alerta personalizada 
           		$("#inicioPrimero").focus();

          	  return false;
		
			}
			if(finp>=inicios || finp<=iniciop){
				alertify.error("El primer trimestre no puede finalizar al mismo tiempo o antes de que inicia el primer trimestre, o despues de que empiece el segundo trimestre");
				return false;
			}
			if(fins>=iniciot || fins<=inicios){
				alertify.error("El segundo trimestre no puede finalizar al mismo tiempo o antes de que inicia el segundo trimestre, o despues de que empiece el tercer trimestre");
				return false;
			}

			if (inicios>=iniciot) {
				alertify.error("El segundo trimestre no puede iniciar al mismo tiempo o despues que inicia el tercer trimestre");
				return false;
			}
			if (iniciot>=inicioc) {
				alertify.error("El tercer trimestre no puede iniciar al mismo tiempo o despues que inicia el cuarto trimestre");
				return false;
			}
			if (inicioc<=iniciot) {
				alertify.error("El segundo trimestre no puede iniciar al mismo tiempo o despues que inicia el tercer trimestre");
				return false;
			}
			  /*
			      $.ajax({
							type: "POST",
							url: 'php/registrarTrimestre.php?inicioP='+iniciop+'&inicioS='+inicios+'&inicioT='+iniciot+'&inicioC='+inicioc+'&finP='+finp+'&finS='+fins+'&finT='+fint+'&finC='+finc,
							data: 'inicioP='+iniciop,
							success: function()
							  {      
							  				  	alert("TRIMESTRE REGISTRADOS CORRECTAMENTE");
				
							   }
			   		 });
			  */
			  $.ajax({
					type: "POST",
					url: 'php/actualizarTrimestre.php?inicioP='+iniciop+'&inicioS='+inicios+'&inicioT='+iniciot+'&inicioC='+inicioc+'&finP='+finp+'&finS='+fins+'&finT='+fint+'&finC='+finc,
					data: 'inicioP='+iniciop,
					success: function()
					  {      
					  	
					  	alertify.success("TRIMESTRE ACTUALIZADO CORRECTAMENTE");
		
					  }
	   		 });

		});

	  	  function MostrarHorario(){
	  	 		var	confirmado="false";
			    var amb = $('#Ambiente').val();
			 	var sinc= $("#CheckSinConfirmar").prop('checked');
			  	var FichaSinConfirmar= $("#CheckPorFichas").prop('checked');
			  	var InstructorSinConfirmar = $("#CheckPorInstructor").prop('checked');

			
			        if(sinc==false && FichaSinConfirmar==false && InstructorSinConfirmar==false)
			        {
			        		 $('#CheckConfirmados').prop('checked', true);
			      			 $('.CheckConfirmados').addClass("confirmados");
			        }
			        else
			        {
			       
			   			     $('#CheckConfirmados').prop('checked', false);
			      			 $('.CheckConfirmados').removeClass("confirmados");
			      			
			        }

			       

			     		if($('#CheckConfirmados').prop('checked'))
			     		{

			     		var	confirmado="true";

			     		 $.ajax({
							    type: "POST",
							    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
							    data: 'vieww='+amb+'&confirmado='+confirmado,
							 }).done(function(events){
							 	      						      
							  			  var color = (events[0].color);
							    	      $(".fc-event").css("background", color);
										 //asigna el color al evento segun el instructor
									      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
							              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
							              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
							              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
							               

							               
							       
							 }).fail(function(){

							 	
							 	alertify.log("Este ambiente no posee horarios confirmados, seleccione otro");
							 	return false;



							 });



			     		}

			     		if($('#CheckSinConfirmar').prop('checked'))
			     		{

			     		var	confirmado="false";

			     		 $.ajax({
							    type: "POST",
							    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
							    data: 'vieww='+amb+'&confirmado='+confirmado,
							  }).done(function(events){


							  			  var color = (events[0].color);
							    		 
									      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
									      //cambia el tamaño de la letra dentro del evento
							            
							              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
							              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
							              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
							               

							               
							  }).fail(function(){

							 	alertify.log("Este ambiente no posee horarios Sin confirmados, seleccione otro");
							 	return false;



							  });


			     		
			     		}
			     			if($('#CheckPorInstructor').prop('checked'))
			     		{


			     		return false;

			     		
			     		}


				       

	   		}

			$('#Ambiente').change(function(){


				var	confirmado="false";
			    var amb = $('#Ambiente').val();
		 		var sinc= $("#CheckSinConfirmar").prop('checked');

		 		 $('#CheckPorInstructor').prop('checked', false);
		 		 $('#CheckPorFichas').prop('checked', false);

		 		  $('.CheckPorFichas').removeClass("porfichas");		
		 		  $('.CheckPorInstructor').removeClass("porinstructor");
		 		  $('.BusquedaPorFicha').addClass('nover');
		 		   $('.BusquedaPorInstructor').addClass('nover');

		        if(sinc==false)
		        {
		        	 $('#CheckConfirmados').prop('checked', true);
		      		 $('.CheckConfirmados').addClass("confirmados");
		        }
		        else
		        {
		       
		      		 $('#CheckConfirmados').prop('checked', false);
		      		 $('.CheckConfirmados').removeClass("confirmados");
		      			
		        }

		       

		     		if($('#CheckConfirmados').prop('checked'))
		     		{
		     			$('#confirmarTodos').removeClass('btn btn-warning');
		     			$('#confirmarTodos').addClass('nover');
		     		var	confirmado="true";
		     		}
			        $.ajax({
						    type: "POST",
						    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
						    data: 'vieww='+amb+'&confirmado='+confirmado,
						    }).done(function (events) {

								  var color = (events[0].color);
						    		 
								      $(".fc-event").css("background", color);
								    
								       //asigna el color al evento segun el instructor
								     //cambia el tamaño de la letra dentro del evento
						     
						              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
						              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
						              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD


						         var date = new Date(2017,0,06); 
						          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

    								setInterval(MostrarHorario, 15000);

								}).fail(function() {
								    alertify.error("NO se encontraron horarios");
								    $('#calendar').fullCalendar('removeEvents');
								});


				    var sede = $('#Sede').val();
					 $.ajax({

			        	type: "GET",
			        	url:  "../demos/MostrarFichas.php",
			        	data:'sede='+sede,
			        	 success: function(resp)
						      {   
						      	$('#Fichas').html(resp);
						  							               
						      }

			        });

		
			        $.ajax({

			        	type: "GET",
			        	url:  "../demos/MostrarInstructores.php",
			        	data:'sede='+sede,
			        	
			        }).done(function(resp){

		        		$('#Instructor').html(resp);
			

			        }).fail(function(){
			        	alertify.error("No se pudieron cargar los instructor, porque? sabra chuchito");
			        });
						 
		       

			   });

			function MostrarPorNotificacion(fecha, amb){
				
				var	confirmado="false";
			    var amb = amb;
	
		 		var sinc= $("#CheckSinConfirmar").prop('checked');

		 		$('#calendario').addClass('nover');
		
		        if(sinc==false)
		        {	$('#CheckSinConfirmar').prop('checked', true);
		        	 $('#CheckConfirmados').prop('checked', false);
		      		 $('.CheckSinConfirmar').addClass("sinconfirmar");
		        }
		        else
		        {
		       
		      		 $('#CheckConfirmados').prop('checked', false);
		      		 $('.CheckConfirmados').removeClass("confirmados");
		      			
		        }

		       

		     		if($('#CheckConfirmados').prop('checked'))
		     		{

		     		var	confirmado="true";
		     	 
		     		}
		     	
			        $.ajax({
						    type: "POST",
						    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
						    data: 'vieww='+amb+'&confirmado='+confirmado,
						    success: function(events)
						      {      
						      
						  			  var color = (events[0].color);
						    		 
								      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
								      $(".fc-event-container").css("font-size", "22px"); //cambia el tamaño de la letra dentro del evento
						            
						              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
						              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
						              $('#calendar').fullCalendar('rerenderEvents'); // ni puta idea de que hace esto XD
						              
						  
						         var date = new Date(fecha); 
						          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

    							setInterval(MostrarHorario, 10000);
						               
						       }
			    		 });
		       

				}
							
			var fecha =$('#hidden').val();
			var idambiente =$('#hiddenAmb').val();
			var title = $('#modalTitle').html();
		

			if (idambiente>0){

				MostrarPorNotificacion(fecha, idambiente);
			
			}
			else
			{
				
			}


					if(idambiente==0){
						var amb = 0;
					}else
					{
						var amb = $('#hiddenAmb').val();
				  
					}

					function cargarHorarioInicial()
					{	
						var	calendar = $('#calendar').fullCalendar({  // Rellenar calendario por defecto
				            header:{
				                left: 'prev,next today',
				                center: '',
				                right: 'day, month, agendaWeek'
				            },

				            defaultView: 'agendaWeek',
				            editable: true,
				            selectable: true,
				            allDaySlot: false,
				            minTime: '00:00',
				            maxTime:'23:59',
				       		firstDay:1,
				       		eventTextColor:'#fff',
				       		
				       		
				     
				            events: "php/acciones.php?view='"+amb+"'",  // Recibir eventos por defecto de la DB para rellenar
				             
				            eventClick:  function(event, jsEvent, view) {  // when some one click on any event
				            			
				            


						               endtime = $.fullCalendar.moment(event.end).format('h:mm');
						                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
						                var mywhen = starttime + ' - ' + endtime;
						                $('#modalTitle').html(event.title);
						                $('#modalWhen').text(mywhen);
						                $('#eventID').val(event.id);		   

						                var con=$("#CheckConfirmados").prop('checked'); 
						                var sin=$("#CheckSinConfirmar").prop('checked');
						          
						      			  // SI ESTA CHEKEADO EL VER CONFIRMADOS SE LE BORRARA EL BOTON DE CONFIRMAR EN LA VENTANA MODAL 
										if (con==true); // si esta chekeado......
										{
											$("#confirmar").removeClass("btn btn-success");		 	//quita la clase actual	 	
						 					$("#confirmar").addClass("nover"); //agregar la clase que quitara el boton 
										}
				 						// SI ESTA CHEKEADO EL PENDIENTE POR CONFIRMAR SE MOSTRARA EL BOTON DE CONFIRMAR EN LA VENTANA MODAL 
										if (sin==true)
										{
											$("#confirmar").removeClass("nover");		 		 	
						 					$("#confirmar").addClass("btn btn-success"); 
										}
								

						                $('#calendarModal').modal();
						                


						 
										$('#confirmarTodos').click(function(){


										  var title = $('#modalTitle').html();
							
							 			  var amb = $('#Ambiente').val();
							 			  if(amb ==".::SELECCIONAR AMBIENTE::.")
							 			  {
							 			  	amb=$('#hiddenAmb').val();
							 			  }

				
						    
								               $.ajax({

								                   url: 'php/confirmarTodos.php?ambiente='+amb,
								                   data: 'title='+title,
								                   type: "POST",
								                   success: function(json) {
								                	
								                	alertify.success("HORARIOS CONFIRMADOS CORRECTAMENTE!");
								               			 var fecha =$('#hidden').val();
								               			   $('#calendar').fullCalendar('removeEvents');
														 var date = new Date(fecha); 
												          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

						    							setInterval(MostrarPorNotificacion(fecha, idambiente), 3000);

								                 		return false;
								                 		
								                   }
								               });

						 
								 			});
						
				            }, //FIN eventClick
				            
				            select: function(start, end, jsEvent) {  // click on empty time slot
				                endtime = $.fullCalendar.moment(end).format('h:mm');
				                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
				                var mywhen = starttime + ' - ' + endtime;
				                start = moment(start).format();
				                end = moment(end).format();
				                $('#createEventModal #startTime').val(start);
				                $('#createEventModal #endTime').val(end);
				                $('#createEventModal #when').text(mywhen);

				                if ($('#Ambiente').val()>0) { //Sino se ha escogido un ambiente no se mostrata la ventana modal
				                	$('#createEventModal').modal('toggle');	 // ventana modal
				                }else{
				                	alertify.log("POR FAVOR, SELECCIONA UN AMBIENTE PARA REGISTRAR UN HORARIO"); //Mensaje alerta por si aun nose selecciona ambiente
				                }
				              
				         	 }, //FIN eventSelect
				           eventDrop: function(event, delta){ // Evento de eliminar
				              var amb = $('#Ambiente').val();
				               $.ajax({

				                   url: 'php/acciones.php?ambiente='+amb,
				                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
				                   type: "POST",
				                   success: function(json) {
				                   alertify.success("Guardado");
				                 
				                   }
				               });
				         	 },
				           eventResize: function(event) {  // Arrastrar hacia arriba o hacia abajo el evento
				                var ambe = $('#Ambiente').val();

				               $.ajax({
				                   url: 'php/acciones.php?ambiente='+ambe,
				                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
				                   type: "POST",
				                   success: function(json) {
				                       alertify.success("ACTUALIZADO CORRECTAMENTE");
				                   }
				               });
				        	   }
			      	  });//FIN CALENDARIO POR DEFECTO

					}
					
					function cargarConfigHorarioInicial(inicial, fin)
					{	
						var Inicial = inicial;						
						var Fin = fin;

			
						var	calendar = $('#calendar').fullCalendar({  // Rellenar calendario por defecto
				            header:{
				                left: 'prev,next today',
				                center: '',
				                right: ''
				            },

				            defaultView: 'agendaWeek',
				            editable: true,
				            selectable: true,
				            allDaySlot: false,
				            minTime: Inicial, // hora final
							maxTime:Fin ,
							firstDay:1,
							eventTextColor: '#000',
				     
				            events: "php/acciones.php?view='"+amb+"'",  // Recibir eventos por defecto de la DB para rellenar
				             
				            eventClick:  function(event, jsEvent, view) {  // when some one click on any event
				            
						               endtime = $.fullCalendar.moment(event.end).format('h:mm');
						                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
						                var mywhen = starttime + ' - ' + endtime;
						                $('#modalTitle').html(event.title);
						                $('#modalWhen').text(mywhen);
						                $('#eventID').val(event.id);		   

						                var con=$("#CheckConfirmados").prop('checked'); 
						                var sin=$("#CheckSinConfirmar").prop('checked');
						          
						      			  // SI ESTA CHEKEADO EL VER CONFIRMADOS SE LE BORRARA EL BOTON DE CONFIRMAR EN LA VENTANA MODAL 
										if (con==true); // si esta chekeado......
										{
											$("#confirmar").removeClass("btn btn-success");		 	//quita la clase actual	 	
						 					$("#confirmar").addClass("nover"); //agregar la clase que quitara el boton 
										}
				 						// SI ESTA CHEKEADO EL PENDIENTE POR CONFIRMAR SE MOSTRARA EL BOTON DE CONFIRMAR EN LA VENTANA MODAL 
										if (sin==true)
										{
											$("#confirmar").removeClass("nover");		 		 	
						 					$("#confirmar").addClass("btn btn-success"); 
										}
									

						                $('#calendarModal').modal();
						                


						 
										$('#confirmarTodos').click(function(){


										  var title = $('#modalTitle').html();
							
							 			  var amb = $('#Ambiente').val();
							 			  if(amb ==".::SELECCIONAR AMBIENTE::.")
							 			  {
							 			  	amb=$('#hiddenAmb').val();
							 			  }

						

								               $.ajax({

								                   url: 'php/confirmarTodos.php?ambiente='+amb,
								                   data: 'title='+title,
								                   type: "POST",
								                   success: function(json) {
								                	
								                	alertify.success("HORARIOS CONFIRMADOS CORRECTAMENTE!");
								               			 var fecha =$('#hidden').val();
								               			   $('#calendar').fullCalendar('removeEvents');
														 var date = new Date(fecha); 
												          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

						    							setInterval(MostrarPorNotificacion(fecha, idambiente), 10000);

								                 		return false;
								                 		
								                   }
								               });

						 
								 			});
								
						               
						     }, //FIN eventClick
				            
				            select: function(start, end, jsEvent) {  // click on empty time slot
				                endtime = $.fullCalendar.moment(end).format('h:mm');
				                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
				                var mywhen = starttime + ' - ' + endtime;
				                start = moment(start).format();
				                end = moment(end).format();
				                $('#createEventModal #startTime').val(start);
				                $('#createEventModal #endTime').val(end);
				                $('#createEventModal #when').text(mywhen);

				                if ($('#Ambiente').val()>0) { //Sino se ha escogido un ambiente no se mostrata la ventana modal
				                	$('#createEventModal').modal('toggle');	 // ventana modal
				                }else{
				                	alertify.success("POR FAVOR, SELECCIONA UN AMBIENTE PARA REGISTRAR UN HORARIO"); //Mensaje alerta por si aun nose selecciona ambiente
				                }
				              
				         	 }, //FIN eventSelect
				           eventDrop: function(event, delta){ // Evento de eliminar
				              var amb = $('#Ambiente').val();
				               $.ajax({

				                   url: 'php/acciones.php?ambiente='+amb,
				                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
				                   type: "POST",
				                   success: function(json) {
				                   alertify.success("Guardado");
				                 
				                   }
				               });
				         	 },
				           eventResize: function(event) {  // Arrastrar hacia arriba o hacia abajo el evento
				                var ambe = $('#Ambiente').val();

				               $.ajax({
				                   url: 'php/acciones.php?ambiente='+ambe,
				                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
				                   type: "POST",
				                   success: function(json) {
				                       alertify.success("ACTUALIZADO CORRECTAMENTE");
				                   }
				               });
				        	   }

			      	  });//FIN CALENDARIO POR DEFECTO
						

					} //FIN FUNCION cargarConfigHorarioInicial

					cargarHorarioInicial(); //CARGAR HORARIO POR DEFECTO CON TODAS LAS HORAS.
		 				


		 		 		$('#ActualizarHorasHorario').click(function(){

							var inicio =$('#InicioHora').val();
							var fin =$('#FinHora').val();

						
							alertify.alert(inicio + "HASTA: " + fin);
							cargarConfigHorarioInicial(inicio, fin);

						});

		               
		       $('#submitButton').on('click', function(e){ // add event submit
		           // We don't want this to act as a link so cancel the link action
		           e.preventDefault();
		           doSubmit(); // send to form submit function
		       });
		       
		       $('#deleteButton').on('click', function(e){ // delete event clicked
		           // We don't want this to act as a link so cancel the link action
		           e.preventDefault();
		           doDelete();// send data to delete function
		       });
		     
		       
		       function doDelete(){  // delete event 
		           $("#calendarModal").modal('hide');
		           var eventID = $('#eventID').val();

		           $.ajax({
		               url: 'php/acciones.php',
		               data: 'action=delete&id='+eventID,
		               type: "POST",
		               success: function(json) {
		                   if(json == 1)
		                        $("#calendar").fullCalendar('removeEvents',eventID);
		                   else
		                        return false;
		                    
		                   
		               }
		           });
		       }
		       function doSubmit(){ // add event
		           $("#createEventModal").modal('hide');
		           var title = $('#title').val();
		           var startTime = $('#startTime').val();
		           var endTime = $('#endTime').val();
		           var ambb = $('#Ambiente').val();
		           var ins = $('#Instructor').val();
		           var color = $('#color').val();
		           var des = $('#Descripcion').val();
		           var ficha =$('#Fichas').val();			          

		           var lunes= false;
		           var martes=false;
		           var miercoles=false;
		           var jueves=false;
		           var viernes=false;
		           var sabado=false;
		           var domingo=false;
		           var primerT=false;
		           var segundoT=false;
		           var tercerT=false;
		           var cuartoT=false;
		           var realizarP=false;
		           var i=0;
		           var a=0;
		           var b=0;
		           var c=0;
		           var segundoRegistrado=false;

 function registrarPrimerTrimestre(T){
		           	
		           	var limiteTrimestre=T;
		           	while(i<=366){

							var fechaInicio= startTime;
							var fechaDate = new Date(fechaInicio);
							fechaDate.setDate(fechaDate.getDate()+i);

							var	fechaSinHoras = moment(fechaDate, 'YYYY-MM-DD');
						  	fechaSinHoras = fechaSinHoras.format('YYYY-MM-DD');

						
							var	fechadia = moment(fechaDate, 'YYYY-MM-DD');
							var	dia = fechadia.format('dd');

							var dt = new Date(fechaInicio); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var horai = moment(time,'hh:mm'); //hora y minutos de la fecha inicial 
						  	horai = horai.format('HH:mm');	//hora y minutos en variable 	 
						
							var datof= endTime; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
						  	var fechafin = moment(datof, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
						  	fechafin = fechafin.format('YYYY-MM-DD'); //
						
						   	var dt = new Date(datof); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var hora = moment(time,'hh:mm');
						  	hora = hora.format('HH:mm');				 
					
							var start=fechaSinHoras+'T'+horai;

							if(start>=limiteTrimestre){ 

									i=366;
									primerT=false;
								}

							if(dia=="Mo" && lunes==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {


					               		if(json == 0)
					               		{
					               		alert("EL HORARIO YA EXISTE");
					               		}
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia lunes		

							if(dia=="Tu" && martes==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Th" && jueves==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents'); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Sa" && sabado==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
				              	
					                 // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia domingo

						i++;
						}
		           }

		           function registrarSegundoTrimestre(T,I){
		         
		           	var limiteTrimestre=T;
		           	var inicioTrimestre =I;
		           	while(a<=366){
							

							var fechaInicio= startTime;
							var fechaDate = new Date(fechaInicio);
							fechaDate.setDate(fechaDate.getDate()+a);

							var	fechaSinHoras = moment(fechaDate, 'YYYY-MM-DD');
						  	fechaSinHoras = fechaSinHoras.format('YYYY-MM-DD');

						
							var	fechadia = moment(fechaDate, 'YYYY-MM-DD');
							var	dia = fechadia.format('dd');

							var dt = new Date(fechaInicio); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var horai = moment(time,'hh:mm'); //hora y minutos de la fecha inicial 
						  	horai = horai.format('HH:mm');	//hora y minutos en variable 	 
						
							var datof= endTime; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
						  	var fechafin = moment(datof, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
						  	fechafin = fechafin.format('YYYY-MM-DD'); //
						
						   	var dt = new Date(datof); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var hora = moment(time,'hh:mm');
						  	hora = hora.format('HH:mm');				 
					
							var start=fechaSinHoras+'T'+horai;


								var primeroCH=false;
								var pChequeado=$("#Primero").prop('checked'); 
					            if(pChequeado==true){

					            	primeroCH=true;
					            }

							if(start<=inicioTrimestre && primeroCH==false)
							{
								a=367;
									segundoT=false;
									alertify.error("SELECCIONE UNA FECHA MAYOR Q ESTE  ENTRE EL INICIO Y FIN DEL SEGUNDO TRIMESTRE");
									return false;
							}
							if(start>=limiteTrimestre){ 

									a=367;
									segundoT=false;
									alertify.error("SELECCIONE UNA FECHA MENOR ENTRE EL INICIO Y FIN DEL SEGUNDO TRIMESTRE");
									return false;

							}

							if(dia=="Mo" && lunes==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                   $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia lunes		

							if(dia=="Tu" && martes==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Th" && jueves==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Sa" && sabado==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
				              	
					                 // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia domingo

						a++;
						}
		           }
		            function registrarTercerTrimestre(T,I){
		          	var inicioTrimestre=I;
		           	var limiteTrimestre=T;
		          
		           	while(b<=366){
		          
							var fechaInicio= startTime;
							var fechaDate = new Date(fechaInicio);
							fechaDate.setDate(fechaDate.getDate()+b);

							var	fechaSinHoras = moment(fechaDate, 'YYYY-MM-DD');
						  	fechaSinHoras = fechaSinHoras.format('YYYY-MM-DD');

						
							var	fechadia = moment(fechaDate, 'YYYY-MM-DD');
							var	dia = fechadia.format('dd');

							var dt = new Date(fechaInicio); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var horai = moment(time,'hh:mm'); //hora y minutos de la fecha inicial 
						  	horai = horai.format('HH:mm');	//hora y minutos en variable 	 
						
							var datof= endTime; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
						  	var fechafin = moment(datof, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
						  	fechafin = fechafin.format('YYYY-MM-DD'); //
						
						   	var dt = new Date(datof); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var hora = moment(time,'hh:mm');
						  	hora = hora.format('HH:mm');				 
					
							var start=fechaSinHoras+'T'+horai;
						
							if(start>limiteTrimestre){ 

									b=367;
									tercerT=false;
									alert("SELECCIONA UNA FECHA QUE ESTE ENTRE LOS TIRMESTRES SELECCIONADOS");
									return false;
							}


						        var segundoChequeado = false;
							    var Seg=$("#Segundo").prop('checked'); 
					            if(Seg==true){
					            	segundoChequeado=true;
					            }

					            var primeroChequeado=false;
					            var Pri=$("#Primero").prop('checked'); 
					            if(Pri==true){
					            	primeroChequeado=true;
					            }


							if(start<inicioTrimestre && segundoChequeado==false && primeroChequeado==false)
							{
						

								b=367;
								tercerT=false;
								alert("SELECCIONE UNA FECHA QUE ESTE ENTRE EL LOS TRIMESTRES SELECCIONADOScccccccccc");
								return false;
								
							}
							if(start<inicioTrimestre && segundoChequeado==true && primeroChequeado==false)
							{
						

								b=367;
								tercerT=false;
								alert("SELECCIONE UNA FECHA QUE ESTE ENTRE EL LOS TRIMESTRES SELECCIONADOScccccccccc");
								return false;
								
							}
							if(dia=="Mo" && lunes==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia lunes		

							if(dia=="Tu" && martes==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Th" && jueves==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Sa" && sabado==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
				              	
					                 // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia domingo

						b++;
						}
		           }
		      	    function registrarCuartoTrimestre(T,I){

		           	var inicioTrimestre=I;		           
		           	var limiteTrimestre=T;

		           	while(c<=366){

							var fechaInicio= startTime;
							var fechaDate = new Date(fechaInicio);
							fechaDate.setDate(fechaDate.getDate()+c);

							var	fechaSinHoras = moment(fechaDate, 'YYYY-MM-DD');
						  	fechaSinHoras = fechaSinHoras.format('YYYY-MM-DD');

						
							var	fechadia = moment(fechaDate, 'YYYY-MM-DD');
							var	dia = fechadia.format('dd');

							var dt = new Date(fechaInicio); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var horai = moment(time,'hh:mm'); //hora y minutos de la fecha inicial 
						  	horai = horai.format('HH:mm');	//hora y minutos en variable 	 
						
							var datof= endTime; // fecha con formato datetime mysql YYYY-MM-SS 00:00:00
						  	var fechafin = moment(datof, 'YYYY-MM-DD'); // obtener solo la fecha sin hora YYYY-MM-DD
						  	fechafin = fechafin.format('YYYY-MM-DD'); //
						
						   	var dt = new Date(datof); // convierte la fecha tipo datetime en tipo date para poder desglosar las horas minutos y segundos

							var time = dt.getHours('HH') + ":" + dt.getMinutes('mm'); // obtener las horas y minutos de la fecha anterior	
						  	var hora = moment(time,'hh:mm');
						  	hora = hora.format('HH:mm');				 
					
							var start=fechaSinHoras+'T'+horai;

							if(start>=limiteTrimestre)
							{ 

							
									cuartoT=false;
									if(c<3)
									{
											alert("SELECCIONAR UNA FECHA QUE ESTE ENTRE EL RANGO DE TIEMPO DE TRIMESTRES SELECCIONADOS");
											return false;
									}
									return false;
							}
							  var PC=$("#Primero").prop('checked'); 
							  var SC=$("#Segundo").prop('checked'); 
							  var TC=$("#Tercero").prop('checked'); 


							if(start<inicioTrimestre && PC==false && SC==false && TC==false)
							{
									cuartoT=false;
									if(c<3)
									{
											alert("SELECCIONAR UNA FECHA QUE ESTE ENTRE EL RANGO DE TIEMPO DE TRIMESTRES SELECCIONADOS");
											return false;
									}
								
									return false;
							}

							if(dia=="Mo" && lunes==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia lunes		

							if(dia=="Tu" && martes==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Th" && jueves==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia martes
							if(dia=="Sa" && sabado==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
				              	
					                 // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

												//asigna el color al evento segun el instructor

					              	
					                   // remueve los eventos de la consulta anterior//agrega los nuevos eventos al calendario
					                    $('#calendar').fullCalendar('rerenderEvents' ); // n

					                   $("#calendar").fullCalendar('renderEvent',
					                   {
					                       id: json.id,
					                       title: title+" "+"INSTRUCTOR: "+ins+" DESCRIPCION: "+ des,
					                       start: startTime,
					                       end: endTime,

					                   },

					                   true);
					               }
			         		  });

							}			//FIN SI dia domingo

						c++;
				}
		           
		           	//============ VERIFICAR DIAS SELECCIONADOS=======\\

		   
		           }
		           	//============ VERIFICAR DIAS SELECCIONADOS=======\\

		            var Lun=$("#Lunes").prop('checked'); 
		            if(Lun==true){
		            	lunes=true;
		            }

		            var Mar=$("#Martes").prop('checked'); 
		            if(Mar==true){
		            	martes=true;
		            }

		            var Mie=$("#Miercoles").prop('checked'); 
		            if(Mie==true){
		            	miercoles=true;
		            }

		            var Jue=$("#Jueves").prop('checked'); 
		            if(Jue==true){
		            	jueves=true;
		            }

		            var Vie=$("#Viernes").prop('checked'); 
		            if(Vie==true){
		            	viernes=true;
		            }

		            var Sab=$("#Sabado").prop('checked'); 
		            if(Sab==true){
		            	sabado=true;
		            }

		            var Dom=$("#Domingo").prop('checked'); 
		            if(Dom==true){
		            	domingo=true;
		            }

		            //==========VERIFICAR TRIMESTRES SELECCIONADOS E INGRESAR HORARIOS==============\\

		            var CheckPrimero=$("#Primero").prop('checked'); 
		            if(CheckPrimero==true)
		            {
		         	 	 var CheckSegundo=$("#Segundo").prop('checked'); 

			             if(CheckSegundo==true)
			             {	
			             	var CheckTercero=$("#Tercero").prop('checked'); 
			             	if (CheckTercero==true) 
			             	{ 
			             		var CheckCuarto=$("#Cuarto").prop('checked'); 
			             		if (CheckCuarto==true)
			             		{
			             			cuartoT=true;
									var limiteT = $('#finCuarto').val();
									var inicio = $('#inicioCuarto').val();
			             			registrarCuartoTrimestre(limiteT, inicio);
			             			return false;
			             		}
			             		else
			             		{
			             			tercerT=true;
									var limiteT = $('#finTercer').val();
									var inicio = $('#inicioTercer').val();
			             			registrarTercerTrimestre(limiteT, inicio); // todos seleccionados menos el 4to, entonces registra desde la fecha seleccionada Hasta el final del tercer trimestre
			             			return false;
			             		}		             	
			             	}
			             	else
			             	{
			             		segundoT=true;
								var limiteT = $('#finSegundo').val();
								var inicio = $('#inicioSegundo').val();

								registrarSegundoTrimestre(limiteT, inicio);
								return false;
			             	}			          

		            	 }
		            	 else
			             {
			             	primerT=true;
							var limiteT = $('#finPrimero').val();
							var inicio = $('#inicioPrimero').val();

							registrarPrimerTrimestre(limiteT, inicio);
							return false;
			             }	            	
			       
		            }		            		
		            else
		            {
		            	var CheckSegundo=$("#Segundo").prop('checked'); 
			            if(CheckSegundo==true)
			            {	
			            	
			            	var CheckTercero=$("#Tercero").prop('checked'); 
			             	if (CheckTercero==true) 
			             	{ 			             		
			             		var CheckCuarto=$("#Cuarto").prop('checked'); 
			             		if (CheckCuarto==true)
			             		{	
			             			cuartoT=true;
			             			var limiteT = $("#finCuarto").val();
			             			var inicio = $('#inicioCuarto').val();

			             			registrarCuartoTrimestre(limiteT, inicio);
			             			return false;
			             		}			
			             		else
			             		{

			             		tercerT=true;
								var limiteT = $('#finTercer').val();
								var inicio = $('#inicioTercer').val();
								
								registrarTercerTrimestre(limiteT, inicio);
								return false;

			             		}	

			             	}             	
			            
			             	else
			             	{
			             		segundoT=true;
								var limiteT = $('#finSegundo').val();
								var inicio = $('#inicioSegundo').val();

								registrarSegundoTrimestre(limiteT, inicio);
								return false;
			             	}				          

		            	}
		             	else
			            {	             

			            	var CheckTercero=$("#Tercero").prop('checked'); 
			             	if (CheckTercero==true) 
			             	{ 
			             	
			             		var CheckCuarto=$("#Cuarto").prop('checked'); 
			             		if (CheckCuarto==true)
			             		{	

			             			cuartoT=true;
									var limiteT = $('#finCuarto').val();
									var inicio =$('#inicioCuarto').val();
			             			registrarCuartoTrimestre(limiteT,inicio);
			             			return false;
			             		}
			             		
			             			tercerT=true;
									var limiteT = $('#finTercer').val();
									var inicio =$('#inicioTercer').val();
			             			registrarTercerTrimestre(limiteT, inicio);
			             			return false;
			             	
			             	}
			             	else
			             	{
							
			             		var CheckCuarto=$("#Cuarto").prop('checked'); 
			             		if (CheckCuarto==true)
			             		{	
			             			
			             			cuartoT=true;
									var limiteT = $('#finCuarto').val();
									var inicio =$('#inicioCuarto').val();
			             			registrarCuartoTrimestre(limiteT,inicio);
			             			return false;
			             		}
			             		
			             	}	
			          
			            }	  

		            } //Fin del sino de que si el primer trimestre esta checkqueado


				}





		 
		 $('#confirmar').click(function(){


			if($("#CheckSinConfirmar").prop('checked', true))
			{
					var id=$('#eventID').val();
				

		 		  $.ajax({
		                   url: 'php/ConfirmarIndividual.php?idevento='+id,
		                   data: 'action=update&idevento='+id,
		                   type: "POST",
		                   success: function(json) {

			                   if(json == 1)
			                   {
								
									alertify.success("HORARIO CON ID: "+id+" CONFIRMADO CON EXITO");
			                   		 $("#calendar").fullCalendar('removeEvents', id);
								      return false;
	   							}
	   								
			                   else
			                   {
			                  	 	alertify.error("NO SE CONFIRMO EL HORARIO LO SENTIMOS");
			                        return false;
			                   }
		                   	
		                   }
		               });

			}
			else
			{
				alertify.alert("BUENO, EMM NO SE QUE CARAJOS HAS HECHO PARA CAER ACA");
			}
		 

		 });
		 

		 });
