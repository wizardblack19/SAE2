<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
<head>
<link rel="stylesheet" href="css/alertify.core.css"/>
	<link rel="stylesheet" href="css/alertify.default.css"/>
	<script src="js/alertify.js"></script>
	<style type="text/css">
		.ver
		{
			display: block;
		}
		.nover
		{
			display:none;
		}
	</style>
</head>
<?php

	if (isset($_GET['Pais'])) {
	$id = $_GET['id'];	
	$pais = $_GET['Pais'];
	$depto = $_GET['Departamento'];
	$director= $_GET['Director'];
	$nombre =$_GET['Nombre'];

	echo "<input type='hidden' value=".$id." id='inpID'>
		  <input type='hidden' value=".$pais." id='inpPais'>
		  <input type='hidden' value=".$depto." id='inpDepartamento'>
		  <input type='hidden' value=".$director." id='inpDirector'>
		  <input type='hidden' value=".$nombre." id='inpNombre'>";
		# code...
	}


?>
<h3 class="title"><i class="fa fa-fort-awesome" aria-hidden="true"></i> REGIONALES</h3>
</div>
        <div class="card-content table-responsive">
			<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroRegional" id="btnRegistrarRegional">Agregar regional</a>			
             
			<div class="table">
				<?php
				include 'funciones/php/tablaRegional.php';
				?>
			</div>	

        </div>
	  <div class="card-content table-responsive">
		<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdfRegionales.php">EXPORTAR PDF
		</a>
		<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelRegionales.php">EXPORTAR EXCEL
		</a>
		<a class="btn btn btn-info btn-sm" href="funciones/php/exportarWordRegionales.php">EXPORTAR WORD
		</a>
	</div>

</div>	


<?php
include 'views/logic/footer.php';
?>
	<script type="text/javascript" src="js/regional.js">
	</script>   
	 <div class="modal fade" id="ModalRegistroRegional" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <h4 class="modal-title">SIGHO</h4><hr />
		      <div class="card-content">
		      	<input type="hidden" class="form-control" id="IDRegional">
					<div class="form-group ">
						<label for="Pais">Pais:</label>
						<select type="text" class="form-control" name="Pais" id="Pais">
						<option value="">SELECCIONAR PAIS</option>
						<option value="Colombia">COLOMBIA</option>
						</select>
					</div>
					<div class="form-group ">
						<label for="Departamento">Departamento:</label>
						<SELECT type="select" name="Departamento" class="form-control" id="Departamento" required>
 						   <OPTION value="">.::DEPARTAMENTO:.</OPTION>

							<?php
								$con = new Mysqli("localhost", "root", "", "sishorario");
								$sql="SELECT * FROM tblDepartamentos ORDER BY idDepartamento";
								$proceso = mysqli_query($con, $sql);

								while ($depto =mysqli_fetch_object($proceso)) {
									?>
									<option value="<?php echo $depto->iddepartamento ?>"> <?php echo $depto->dep_nombre ?> </option>
								<?php
								}
							?>

 						</SELECT>
					</div>
					<div class="form-group ">
						<label for="Director">Director Regional</label>
						<input type="text" class="form-control" id="Director">

					</div>
					<div class="form-group ">
						<label for="NombreRegional">Nombre Regional</label>
						<input type="text" class="form-control" id="Nombre">
					</div>
						<div class="form-group ">
							
								
									<button class="btn btn-success" id="agregarregional" data-dismiss="modal">REGISTRAR</button>	
								
								
									<button class="btn btn-primary" id="ActualizarRegional" data-dismiss="modal">ACTUALIZAR</button>	
							
								
									<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
								
										
						
						
					</div>

			 </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>