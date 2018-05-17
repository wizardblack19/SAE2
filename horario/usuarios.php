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
		<h3 class="title"><i class="fa fa-group" aria-hidden="true"></i> USUARIOS</h3>
        </div>
        <div class="card-content table-responsive">
			<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroUsuario">Agregar usuario</a>
			
             
			<div class="table">
		<?php

		include 'funciones/php/tablaUsuario.php';
		?>
		</div>	
        </div>
</div>	

<?php
include 'views/logic/footer.php';
?>
	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	$("#user").addClass("active");

    	});
	</script>

	<div class="modal fade" id="ModalRegistroUsuario" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">X</button>
		<h4 class="modal-title">REGISTRO USUARIOS</h4><hr />
		  <div class="card-content">
				<div class="form-group ">
					<label for="Usuario">Usuario</label>
					<input name="Usuario" class="form-control" id="Usuario"/>
				</div>
				<div class="form-group ">
					<label for="Contraseña">Contraseña</label>
					<input name="Contraseña" class="form-control" id="Contraseña"/>
				</div>
				<div class="form-group ">
					<label for="Roll">Roll</label>
					<select name="Roll" class="form-control" id="Roll">
						<option value="0">.::SELECCIONAR ROLL::.</option>
						<option value="1">ADMINISTRADOR</option>
						<option value="2">INSTRUCTOR</option>
						<option value="3">APRENDIZ</option>
					</select>
				</div>
			</div>
		</div>
	</div>
  </div>
  
</div>
</div>