<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
<script type="text/javascript" src="js/centro.js"></script>	

<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="fa fa-university" aria-hidden="true"></i> CENTROS</h3>
</div>
<div class="card-content table-responsive">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroCentro">Agregar Centro</a>
	<div id="tabla_centro">
		<?php
		include	'Funciones/php/TablaCentro.php';
		?>
	</div>
</div>
 <div class="card-content table-responsive">
	<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdfCentros.php">EXPORTAR PDF
	</a>
	<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelCentros.php">EXPORTAR EXCEL
	</a>
	<a class="btn btn-primary btn-sm" href="funciones/php/exportarWordCentros.php">EXPORTAR WORD
	</a>
</div>
</div>	
<?php
include 'views/logic/footer.php';
?>


<div class="modal fade" id="ModalRegistroCentro" role="dialog">
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
					<label for="Municipio">Municipio:</label>
					<select name="Municipio" class="form-control" id="Municipio"></select>
				</div>
				<div class="form-group ">
					<label for="Codigo">Codigo</label>
					<input type="text" class="form-control" id="Codigo">
				</div>
				<div class="form-group ">
					<label for="Director">Director Centro</label>
					<input type="text" class="form-control" id="Director">
				</div>
				<div class="form-group ">
					<label for="Nombre">Nombre Centro</label>
					<input type="text" class="form-control" id="Nombre">
				</div>
				<div class="form-group ">
					<label for="Direccion">Direccion</label>
					<input type="text" class="form-control" id="Direccion">
				</div>
				<div class="form-group ">
					<label for="Telefono">Telefono</label>
					<input type="text" class="form-control" id="Telefono">
				</div>
				<div class="form-group ">
					<label for="Email">Email</label>
					<input type="text" class="form-control" id="Email">
				</div>
				<div class="form-group">
					<button class="btn btn-success" id="AgregarCentro" data-dismiss="modal">REGISTRAR</button>
					<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
				</div>

		 </div>
		</div>
	</div>
  </div>
  
</div>
</div>