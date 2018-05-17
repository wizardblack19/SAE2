<?php
include 'views/indexs/navbar.php';
?>
<br><br><br><br><br><br>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-1">
	<a class="navbar-brand" href="index.php"><img alt="Sigho - Logo" src="assets/img/sigho.png" style="width:700px; height:200px; left:-20%; position:relative; opacity:1.0; top:29px"></a>

</div>
	<div class="col-md-5 col-md-offset-2">

		<div class="card">
			<div class="card-header" data-background-color="green">
				<h4 class="title">Acceder a <b>SIGHO</b></h4>
			</div>
			<div class="card-content table-responsive">
				<form accept-charset="UTF-8" role="form" class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="login">
					<fieldset>
						<div class="form-group is-empty">
							<input class="form-control" placeholder="Usuario" name="usuario" type="text" required="">
						<span class="material-input"></span></div>
						<div class="form-group is-empty">
							<input class="form-control" placeholder="Contraseña" name="password" type="password" value="" required="">
						<span class="material-input"></span></div>
						<input class="btn btn-warning btn-block" type="submit" value="Iniciar Sesion">
					</fieldset>
				  </form>
			</div>
		</div>
		<?php  if(!empty($errores)): ?>
		<div class="alert alert-danger" role="alert">
		<strong>Error al ingresar:</strong> <?php echo $errores; ?>!
		</div>
        <?php  endif; ?>
	</div>
</div>
</div>
<br><br><br><br><br><br>
<?php
include 'views/indexs/footer.php';
?>

