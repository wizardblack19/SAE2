
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SIGHO | Sistema de Gestion de Horarios</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
 	<link rel="stylesheet" href="css/alertify.core.css"/>
	<link rel="stylesheet" href="css/alertify.default.css"/>
	<script src="js/alertify.js"></script>
	<script src="js/jquery.js"></script>
</head>

<body>

	<div class="wrapper">
<?php session_start();

if (isset($_SESSION['admin']) ) {
	echo '<div class="sidebar" data-color="green-dark" data-image="assets/img/sidebar-1.jpg">';
} 
if (isset($_SESSION['instructor']) ) {
		echo '<div class="sidebar" data-color="orange"  data-image="assets/img/sidebar-1.jpg">';
}
?>
			<div class="logo">
				<a href="index.php" class="simple-text">
                <img alt="Sigho - Logo" src="assets/img/sigho.png" width="170px">
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	            	<?php  if(isset($_SESSION['admin'])): ?>
							<li id="home">
								<a href="index.php">
									<i class="material-icons">dashboard</i>
									<p>Inicio</p>
								</a>
							</li>
						
							<li id="region">
								<a href="regional.php">
									<i class="fa fa-fort-awesome" aria-hidden="true"></i> 
									<p>Regionales</p>
								</a>
							</li>
							<li id="center">
								<a href="centro.php" >
									<i class="fa fa-university" aria-hidden="true"></i>
									<p>Centros</p>
								</a>
							</li>
							<li id="sede">
								<a href="sede.php">
									
									<i class="material-icons">account_balance</i>
									<p>Sedes</p>
								</a>
							</li>
							<li id="program">
								<a href="programa.php">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i> 
									<p>Programas</p>
								</a>
							</li>
							<li id="tacks">
								<a href="fichas.php">
									<i class="fa fa-tags" aria-hidden="true"></i>
									<p>Fichas</p>
								</a>
							</li>
							<li id="ambient">
								<a href="ambiente.php">
								<i class="fa fa-home" aria-hidden="true"></i>
									<p>Ambientes</p>
								</a>
							</li>
							<li id="teacher">
								<a href="instructor.php">
								<i class="material-icons">contact_mail</i>
									<p>Instructores</p>
								</a>
							</li>
							<li id="user">
								<a href="usuarios.php">
								<i class="fa fa-group" aria-hidden="true"></i>
									<p>Usuarios</p> 
								</a>
							</li>
							
						
							<li id="calendar">
								<a href="horario.php">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<p>Horarios</p>
								</a>
							</li>
						<?php  endif; ?>
						  	<?php  if(isset($_SESSION['instructor'])): ?>
						  		<li id="calendar" class="active">
								<a href="horario.php">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<p>Horarios</p>
								</a>
							</li>
									<?php  endif; ?>
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">