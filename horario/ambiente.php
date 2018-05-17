<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
	<script type="text/javascript" src="js/ambiente.js"></script>
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="fa fa-home" aria-hidden="true"></i> AMBIENTES</h3>
</div>
<div class="card-content table-responsive">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroAmbiente">Agregar Ambiente</a>
<div id="tabla_ambiente">
	<?php
	include	'funciones/php/TablaAmbiente.php';
	?>
</div>
</div>
<div class="card-content table-responsive">
	<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdfAmbiente.php">EXPORTAR PDF
	</a>
	<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelAmbiente.php">EXPORTAR EXCEL
	</a>
	<a class="btn btn-info btn-sm" href="funciones/php/exportarWordAmbiente.php">EXPORTAR WORD
	</a>
</div>
</div>	
<?php
include 'views/logic/footer.php';
?>

  
<div class="modal fade" id="ModalRegistroAmbiente" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">X</button>
		<h4 class="modal-title">SIGHO</h4><hr />
		  <div class="card-content">

			
				<div class="form-group ">
					<label for="Regional">Regional:</label>
					<select type="select" name="Regional" class="form-control" id="Regional" required>
								<option value="">.::Regional:.</option>

								 <?php
									 $con = new mysqli("localhost", "root", "", "sishorario");
									 $sql="SELECT * FROM tblRegional ORDER BY idRegional";
									 $proceso = mysqli_query($con, $sql);

									 while ($regional =mysqli_fetch_object($proceso)) {
										 ?>
										 <option value="<?php echo $regional->reg_departamento ?>"> <?php echo $regional->reg_nombre ?> </option>
										<?php
									 }
								 ?>

							 </select>
							 
							 
				</div>
		
				<div class="form-group ">
					<label for="Centro">Centro:</label>
					<select name="Centro" class="form-control" id="Centro"></select>
				</div>
				<div class="form-group ">
					<label for="Sede">Sede</label>
					<select name="Sede" class="form-control" id="Sede"></select>
				</div>
				<div class="form-group ">
					<label for="Tipo">Tipo Ambiente:</label>
					<select name="Tipo" class="form-control" id="Tipo">
						<option value="Compartido">Compartido</option>
						<option value="Unico">Unico</option>
					</select>
				</div>
				<div class="form-group ">
					<label for="Nombre">Nombre Ambiente</label>
					<input type="text" class="form-control" id="Nombre">
				</div>
				<div class="form-group ">
					<label for="Cantidad">Capacidad Aprendices</label>
					<input type="text" class="form-control" id="Cantidad">
				</div>
				
				<div class="form-group">
					<button class="btn btn-success" id="AgregarAmbiente" data-dismiss="modal">REGISTRAR</button>
					<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
				</div>

		 </div>
		</div>
	</div>
  </div>
  
</div>
</div>