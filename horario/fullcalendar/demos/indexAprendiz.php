
	<!DOCTYPE html>
	<html>
		<head>

			<style>
				

				 input[type="checkbox"]
				 {

				  background: #f2f2f2;
				  width:10%;
				  height:20px;
				    padding: 10px;
				  box-sizing: border-box;
				  font-size: 12px;
				  border:1px solid #ddd;
				  border-radius:3px;
				  float:left;
				  }

				 select
				 {
				  font-family: "Roboto", sans-serif;
				  outline: 0;
				  background: #f2f2f2;
				  width: 50%;
				  margin: 0 0 10px;
				  height: 38px;
				  padding: 10px;
				  box-sizing: border-box;
				  font-size: 12px;
				  border:1px solid #ddd;
				  border-radius:3px;
				  float:left;
				  }

				

			</style>

			<script src="js/jquery.min.js"></script>
			<!-- custom scripts --> 
			<!-- bootstrap -->
			<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
			<link  href="css/bootstrap.min.css" rel="stylesheet" >
			<!-- fullcalendar -->
			<link href="css/fullcalendar.css" rel="stylesheet" />
			<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
			<script src="js/moment.min.js"></script>
			<script src="js/fullcalendar.js"></script>
			<link rel="stylesheet" href="css/alertify.core.css"/>
			<link rel="stylesheet" href="css/alertify.default.css"/>
			<script src="js/alertify.js"></script>
		</head>
		<body>

			<div class="container">
			<div class="row">
			        <div class="content">
		                    <div class="col-sm-12">
		                        <div class="card card-stats">
		                         
		                            <div style="padding:3%" >
		                              	<center>
		                                <label class="card" ><b>INGRESE SU NUMERO DE FICHA PARA DESCARGAR SU HORARIO: </b></label>
		                             	<input type="text" class="form-control" id="NroFicha" placeholder="NUMERO DE FICHA"><br>
		                           
		                             	    <a type="button" id="GenerarHorarioAprendiz" class="btn btn-success col-sm-12" >GENERAR HORARIO</a>
		                             	</center>
		                            </div>
		             
		                        </div>
		                    </div>
		      		</div>		      
		    </div>

			<div class="row">
					<hr>
					<button id="printpdf" class="btn btn-default btn-sm">Imprimir Horarios</button>
			</div>
				<hr>
			<div id="calendar">	
			</div>
		</div>
		<div class="calendaR">
			
		</div>
	
				
		
	
			<script type="text/javascript" src="js/horarioaprendiz.js"></script> 
			<script src="js/alertify.js"></script>

		
		
		<!--Modal-->
		</body>
	</html>







