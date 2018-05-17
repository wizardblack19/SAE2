	$(document).ready(function(){
		

				var inst=$('#sesionInstructor').val();
	
				$.ajax({

					type:"GET",
					url: "php/cargarHorarioConfigurado.php?instructor="+inst,

				}).done(function(datos){


					var inicio= datos[0].desde;
					var fin= datos[0].hasta;

					if(inicio=="" && fin=="")
					{
						$('#ModalConfiguracionHoras').modal('toggle');
						$('#ModalConfiguracionHoras').modal('show');
						return false;
					}

							$('#ConfigHoras').removeClass("btn btn-warning btn-sm");
							$('#ConfigHoras').addClass("nover");

							$('#printpdf').removeClass("btn btn-default btn-sm");
							$('#printpdf').addClass("nover");

							cargarConfigHorarioInicial(inicio, fin);

				}).fail(function(){
					alertify.log("ESTO ES VERGONZOSO :V NO SABEMOS PORQE ESTA ALERTA");
					
				})

	 		$('#ActualizarHorasHorario').click(function(){

							var inicio =$('#InicioHora').val();
							var fin =$('#FinHora').val();
							var inst =$('#sesionInstructor').val();

							if(inicio=="" || fin =="")
							{
								alertify.alert("Por Seleccione una hora de incio y una hora de fin");
								return false;
							}
							else
							{
								if(inicio>=fin)
								{
									alertify.alert("La hora de inicio es mayor a la hora final, intentelo nuevamente");
									return false;
								}
								alertify.alert(inicio + "HASTA: " + fin);
								
							$('#ConfigHoras').removeClass("btn btn-warning btn-sm");
							$('#ConfigHoras').addClass("nover");

							$('#printpdf').removeClass("btn btn-default btn-sm");
							$('#printpdf').addClass("nover");

								$.ajax({
									type: "GET",
									url: "php/registrarConfiguracionHorario.php?desde="+inicio+"&hasta="+fin+"&instructor="+inst,
								}).done(function(resp){

									var a=resp;
									if(a==1){
										alert("REGISTRADO CORRECTO");
										cargarConfigHorarioInicial(inicio, fin);
										return true;


									}
									if(a==0){
										alert("NO REGISTRADO");
										return false;
									}
							

								}).fail(function(){
									alertify.error("No se pudo registrar la configuracion de horario para el instructor");
									return false;
								}); // FIN DEL AJAX

						
							} //fin else
					

						});	//FIN CLICK

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

		function MostrarHorario(){
  	 		var	confirmado="true";
		    var amb = $('#Ambiente').val();
		    	

		     		  $.ajax({
						    type: "POST",
						    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
						    data: 'vieww='+amb+'&confirmado='+confirmado,
						  
			    		 }).done(function(events){

				  			  var color = (events[0].color);
				    		 
						      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
						      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
				            
				              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
				              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
				              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
				               
			    		 }).fail(function(){

			    		 	alertify.log("NO HAY HORARIOS CONFIRMADOS WEY :VV SELECCIONA OTRO AMBIENTE");
			    		 	return true;


			    		 });
	  			
		}

			$('#Ambiente').change(function()
			{
			var	confirmado="true";
		    var amb = $('#Ambiente').val();

		 
		      	
			        $.ajax({
						    type: "POST",
						    url: 'php/acciones.php?vieww='+amb+'&confirmado='+confirmado,
						    data: { vieww:amb, confirmado:confirmado }
						  	 }).done(function(events){

								  var color = (events[0].color);
						    		 
								      $(".fc-event").css("background", color);
								     //asigna el color al evento segun el instructor
								      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
						            
						              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
						              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
						              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD


						         var date = new Date(2017,0,06); 
						          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

    								setInterval(MostrarHorario, 10000);

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
					    var instructor= $('#sesionInstructor').val();	 							
	 					$("#Instructor").val(instructor).change();

			        }).fail(function(){
			        	alertify.error("No se pudieron cargar los instructor, porque? sabra chuchito");
			        });

       

			   });

				var fecha =$('#hidden').val();
				var idambiente =$('#hiddenAmb').val();
				var title = $('#modalTitle').html();
		
					if(idambiente==0){
						var amb = 0;
					}else
					{
						var amb = $('#hiddenAmb').val();
				  
					}

		
					
				function cargarConfigHorarioInicial(inicial, fin)
					{	
						var Inicial = inicial;						
						var Fin = fin;

					
						//Inicial='06:00';
						//Fin ='18:00';
						

						var	calendar = $('#calendar').fullCalendar({  // Rellenar calendario por defecto
				            header:{
				                left: 'prev,next today',
				                center: '',
				                right: ''
				            },

				            defaultView: 'agendaWeek',
				            editable: false,
				            selectable: true,
				            allDaySlot: false,
				            minTime: Inicial, // hora final
							maxTime:Fin ,
							firstDay:1,
							defaultDate: "2017-01-05",
				     
				            events: "php/acciones.php?view='"+amb+"'",  // Recibir eventos por defecto de la DB para rellenar
				             
				            eventClick:  function() {  // when some one click on any event
				            			
				            			alertify.log("NO TIENES PERMISOS PARA REALIZAR ESTA ACCION");
 							},
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
				                	alertify.error("POR FAVOR, SELECCIONA UN AMBIENTE PARA REGISTRAR UN HORARIO"); //Mensaje alerta por si aun nose selecciona ambiente
				                }
				              
				         	 }, //FIN eventSelect
			
				          
			      	  });//FIN CALENDARIO POR DEFECTO
					

					} //FIN FUNCION cargarConfigHorarioInicial

				//	cargarHorarioInicial(); //CARGAR HORARIO POR DEFECTO CON TODAS LAS HORAS.
		 				

	



		               
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
		       
		           var a=0;
		           var b=0;
		           var c=0;
		           var segundoRegistrado=false;
		         
		           var segundoRegistrado=false;
		           function registrarPrimerTrimestre(T){
		           	    var i=0;
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
		               success: function(json){		       			

		               	if(json==1){

					   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
					 	  i=i+500;
						primerT=false;
						return false;

		               	}               	

			               	   $('#calendar').fullCalendar('rerenderEvents' );					                   
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
	        	
					                   	if(json==1)
					                   	{
					                   		alertify.error("CONFLICTO CON HORARIOS");
					                   		return false;
					                   		i=500;
					                   	}	

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

										if(json==1){

											   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
											 	  i=i+500;
												primerT=false;
												return false;

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

							}			//FIN SI dia martes
							if(dia=="Th" && jueves==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

											if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

											if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia martes
							if(dia=="Sa" && sabado==true && primerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
							          if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

					               		}               	
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
					          
			         		  }).done(function(json){

			         		  		if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

			         		  }).fail(function(){


			         		  	   alertify.log("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
			         		  	   return false;

			         		  });

							}			//FIN SI dia domingo

						i++;
						}

		           }

		           function registrarSegundoTrimestre(T,I){
		         
		           	var limiteTrimestre=T;
		           	var inicioTrimestre =I;
		           	var segundoR=false;	
		           	while(a<=366){
							if(a==2)
							{
								segundoR=true;
							}

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
									if(segundoR==true)
									{
										return false;
									}
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


										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							if(dia=="Tu" && martes==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

											
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	
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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia jueves
							if(dia=="Fr" && viernes==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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
				              	
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && segundoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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
									alertify.alert("SELECCIONA UNA FECHA QUE ESTE ENTRE LOS TIRMESTRES SELECCIONADOS");
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
						

								b=366;
								tercerT=false;
								alertify.alert("SELECCIONE UNA FECHA QUE ESTE ENTRE EL LOS TRIMESTRES SELECCIONADOScccccccccc");
								return false;
								
							}
							if(start<inicioTrimestre && segundoChequeado==true && primeroChequeado==false)
							{
						

								b=366;
								tercerT=false;
							alertify.alert("SELECCIONE UNA FECHA QUE ESTE ENTRE EL LOS TRIMESTRES SELECCIONADOScccccccccc");
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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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
				              	
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && tercerT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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
										alertify.alert("SELECCIONAR UNA FECHA QUE ESTE ENTRE EL RANGO DE TIEMPO DE TRIMESTRES SELECCIONADOS");
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
								alertify.alert("SELECCIONAR UNA FECHA QUE ESTE ENTRE EL RANGO DE TIEMPO DE TRIMESTRES SELECCIONADOS");
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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							if(dia=="Tu" && martes==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {
	        	
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia martes

							if(dia=="We" && miercoles==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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

										
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	
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
				              	
										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

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

							}			//FIN SI dia sabado
							if(dia=="Su" && domingo==true && cuartoT==true){
													
								start=fechaSinHoras+'T'+horai;
								var end=fechaSinHoras+'T'+hora;
								
								 $.ajax({
					               url: 'php/RegistrarEvento.php?ambiente='+ambb+'&ficha='+ficha,
					               data: 'action=add&descripcion='+des+'&color='+color+'&instructor='+ins+'&title='+title+'&start='+start+'&end='+end,
					               type: "POST",
					               success: function(json) {

										if(json==1){

										   alertify.error("SU HORARIO ESTA GENERANDO CONFLICTO CON EL DE OTRO INSTRUCTOR, POR FAVOR VERIFIQUELO!");
										 	  i=i+500;
											primerT=false;
											return false;

							              	}               	

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
			             		;
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



		   	$('#CheckSinConfirmar').click(function(){

		   			var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}


		 		$(".CheckSinConfirmar").addClass("sinconfirmar"); //agregar color de fondo
	
		 		var checked="true";
		 	 		if (this.checked) { //si esta seleccionado el checkbox quitara el color y el chulo de otros checkbox si los hay

		 	 		//=============CheckboxCONFIRMADOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS===========
		 	 				 $("#CheckConfirmados").prop('checked', false);
		 					  $(".CheckConfirmados").removeClass('confirmados');

		 			//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorInstructor").prop('checked', false);
		 					  $(".CheckPorInstructor").removeClass('porinstructor');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorFichas").prop('checked', false);
		 					  $(".CheckPorFichas").removeClass('porfichas');

		 					  //====

	  							  alertify.success('MOSTRAR HORARIOS PENDIENTES');
		 					   var checked="false";


		  				var amb = $('#Ambiente').val();
		     
		      				  $.ajax({
					 			type: "POST",
							    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
							    data: {checked:amb},							    
 								}).done(function(events){
											  var color = (events[0].color);
							    		 
									      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
									      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
							            
							              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
							              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
							              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
 								}).fail(function(){

							        $('#calendar').fullCalendar('removeEvents');
 									alertify.error("NO SE ENCONTRARON HORARIOS PENDIENTES");
 									return true;

 								});
		    		

		  

		 			}
		 			else
		 			{
						$("#CheckSinConfirmar").prop('checked', true);

		 			}
		 	


			});



		 	$('#CheckConfirmados').click(function(){
				var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}
		 		var checked="false";
		 		$(".CheckConfirmados").addClass("confirmados");



		 			if(this.checked){

						//=============CheckBoxSINCONFIRMARRRRRRRRRRRRRRRRRRRRRRRRR===========
		 	 				 $("#CheckSinConfirmar").prop('checked', false); //quita la seleccion
		 					  $(".CheckSinConfirmar").removeClass('sinconfirmar'); //quita el color de fondo

		 				//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorInstructor").prop('checked', false);
		 					  $(".CheckPorInstructor").removeClass('porinstructor');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorFichas").prop('checked', false);
		 					  $(".CheckPorFichas").removeClass('porfichas');

		 			//========================================

		   						alertify.success('MOSTRAR HORARIOS CONFIRMADOS');
								var checked="true";

									var amb = $('#Ambiente').val();
		     
		       				 $.ajax({
					 		   type: "POST",
							    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
							    data: {checked:amb }

							  
		    				 }).done(function(events){
		    				 	  var color = (events[0].color);
					    		 
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
		    				 }).fail(function(){


		    				 	 	alertify.error("NO SE ENCONTRAR HORARIOS CONFIRMADOS =( ");
								    $('#calendar').fullCalendar('removeEvents');




		    				 });

		 		}
		 		else{
		 		
				 $("#CheckConfirmados").prop('checked', true);

		 			}
		  	  

			});
		 	$('#CheckPorInstructor').click(function(){

				var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS POR INSTRUCTOR");
		   			return false;
		   		}
		 		$(".CheckPorInstructor").addClass("porinstructor");

				var checked="true";

				 	if(this.checked){
				    alertify.success('MOSTRAR HORARIOS PENDIENTES');

				var checked="false";
				 }else{
				 	alertify.confirm("MOSTRAR LOS CONFIRMADOS???? pero si es por instructor:V");
				 	var checked="true";
				 }
				  var amb = $('#Ambiente').val();
				     
		        $.ajax({
					    type: "POST",
					    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
					    data: 'checked='+amb,
					    success: function(events)
					      {      
					      
					  			  var color = (events[0].color);
					    		 
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
					               
					       }
		    		 });

		  

			});
			$('#CheckPorFichas').click(function(){
				var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}
		 		$(".CheckPorFichas").addClass("porfichas");

		 		

				var checked="true";

				 	if(this.checked){
				    alertify.info('MOSTRAR LOS PENDIENTES');

				var checked="false";
				 }else{
				 	alertify.confirm("MOSTRAR LOS CONFIRMADOS?");
				 	var checked="true";
				 }
				  var amb = $('#Ambiente').val();
		     
		        $.ajax({
					    type: "POST",
					    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
					    data: 'checked='+amb,
					    success: function(events)
					      {      
					      
					  			  var color = (events[0].color);
					    		 
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
					               
					       }
		    		 });

		  
			});
		 
		 
		 
				
		 });
