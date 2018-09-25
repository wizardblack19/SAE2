<?php
$version = '3.0';
$build='022018';
$head = "";
$perfil = json_decode($_COOKIE['perfil'], TRUE);
$year = date('Y');
include("funciones.php");
$foother = <<<EOT
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<ul class="nav navbar-nav visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="footer">
			<div class="navbar-text">
				&copy; 2013 - {$year}. <a href="#" class="navbar-link">Desarrolla: Marvin Lopez</a>  <a href="http://gtdesarrollo.net" class="navbar-link" target="_blank">GT Desarrollo</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">Build: {$build}</a></li>
				</ul>
			</div>

		</div>
	</div>
EOT;



$msglist = <<<EOT
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Mensajes</span>
						<span class="badge bg-warning-400">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Mensajes
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">5</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">James Alexander</span>
										<span class="media-annotation pull-right">04:58</span>
									</a>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">4</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Margo Baker</span>
										<span class="media-annotation pull-right">12:16</span>
									</a>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Jeremy Victorino</span>
										<span class="media-annotation pull-right">22:48</span>
									</a>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Beatrix Diaz</span>
										<span class="media-annotation pull-right">Tue</span>
									</a>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Richard Vango</span>
										<span class="media-annotation pull-right">Mon</span>
									</a>
									
									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
EOT;


$user = <<<EOT
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span> {$perfil['nombres']} </span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href=""><i class="icon-user-plus"></i> Mi perfil</a></li>
						<li><a href="./miscursos.php"><i class="icon-coins"></i> Mis cursos</a></li>
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Alertas</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Editar cuenta</a></li>
						<li><a href="core.php?l=logout"><i class="icon-switch2"></i> Salir</a></li>
					</ul>
				</li>
EOT;

$user2 = <<<EOT
			<div class="category-content sidebar-user">
				<div class="media">
					<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold"> {$perfil['nombres']} </span>
						<div class="text-size-mini text-muted">
							<i class="icon-pin text-size-small"></i> &nbsp;{$perfil['apellidos']}
						</div>
					</div>

					<div class="media-right media-middle">
						<ul class="icons-list">
							<li>
								<a href="#"><i class="icon-cog3"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
EOT;





$menu_s = <<<EOT
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">SAE <small> {$version}</small></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
			<p id="ver" class="navbar-text"><span id="verUNIDAD" class="label bg-success-400 ">Seleccione Unidad</span></p>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">{$msglist} {$user}</ul>
		</div>
	</div>
EOT;


$menu2 = <<<EOT
		<div class="breadcrumb-line">
			<ul class="breadcrumb-elements">
				<li><a href="#"><i class="icon-comment-discussion position-left"></i> Soporte</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-gear position-left"></i>
						<span id="unidad">Unidad a Trebajar</span>
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a class="unidad" unidad="1" href="#"><i class="icon-statistics"></i> Primera Unidad</a></li>
						<li><a class="unidad" unidad="2" href="#"><i class="icon-statistics"></i> Segunda Unidad</a></li>
						<li><a class="unidad" unidad="3" href="#"><i class="icon-statistics"></i> Tercera Unidad</a></li>
						<li><a class="unidad" unidad="4" href="#"><i class="icon-statistics"></i> Cuarta Unidad</a></li>
					</ul>
				</li>
			</ul>
		</div>
EOT;


$pageheader = <<<EOT
	<div class="page-header">
		$menu2;
		<!--
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard <small>Hello, {$perfil['nombres']}!</small></h4>
			</div>
			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>-->

	</div>
EOT;

$este_lugar = lugar();
function menu(){
	global $este_lugar;
	$data = '
	<div class="category-content no-padding">
	<ul class="navigation navigation-main navigation-accordion">
		<!-- Main -->
		<li class="navigation-header"><span>Sistema Administrativo Educativo</span> <i class="icon-menu" title="Main pages"></i></li>
		<li '; if( $este_lugar == "index" || $este_lugar == ""){$data .= "class='active'";}; $data .= '><a href="index.php"><i class="icon-home4"></i> <span>Inicio</span></a></li>
		<li>
			<a href="#"><i class="icon-stack2"></i> <span>Mis opciones</span></a>
			<ul>
				<li '; if($este_lugar == "miscursos"){$data .= "class='active'";}; $data .= '><a href="miscursos.php">Mis Cursos</a></li>
				<li '; if($este_lugar == "archivos"){$data .= "class='active'";}; $data .= '><a href="archivos.php">Archivos</a></li>
				<li '; if($este_lugar == "zona"){$data .= "class='active'";}; $data .= '><a href="zona.php">Notas</a></li>

				<!--
				<li class="cosa "><a href="boxed_full.html">Boxed full width</a></li>
				-->
			</ul>
		</li>
		<li>
			<a href="#"><i class="icon-copy"></i> <span>Configuración</span></a>
			<ul>
				<li '; if($este_lugar == "configuracion"){$data .= "class='active'";}; $data .= '><a href="configuracion.php">Institucional</a></li>
				<li '; if($este_lugar == "academico"){$data .= "class='active'";}; $data .= '><a href="academico.php">Académico</a></li>
				<li '; if($este_lugar == "docentes"){$data .= "class='active'";}; $data .= '><a href="docentes.php">Usuarios</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="icon-droplet2"></i> <span>Administrativo</span></a>
			<ul>
				<li '; if($este_lugar == "inscripcion" || $este_lugar == "data"){$data .= "class='active'";}; $data .= '><a href="inscripcion.php">Inscripción</a></li>
				<li><a href="colors_success.html">Success palette</a></li>
				<li><a href="colors_warning.html">Warning palette</a></li>

			</ul>
		</li>

		<!-- /main -->
	</ul>
	</div>';
return $data;
}


$menu = menu();



$sidebar = <<<EOT
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-fixed">
					<div class="sidebar-content">
						<div class="sidebar-category sidebar-category-visible">
							<!--<div class="category-title h6">
								<span>Opciones</span>
								<ul class="icons-list">
									<li><a href="#" data-action="collapse"></a></li>
								</ul>
							</div>-->
								$user2 $menu
						</div>
					</div>
				</div>
			</div>
EOT;



$head = '
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta id="codigo" source="SAE2" code="" />
		<meta id="verUNIDAD1" source="SAE2" code="0" />
		<title>SAE - Sistema Administrativo Educativo</title>
		<link rel="manifest" href="manifest.json" />
		<link rel="icon" type="image/png" href="assets/images/icon/launcher-icon-1x.png" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
		<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
		<script type="text/javascript" src="assets/js/pages/print.js"></script>
		<script type="text/javascript" src="assets/js/sisyphus.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
		<link rel="stylesheet" href="assets/js/plugins/sceditor/minified/themes/default.min.css" />
		<script src="assets/js/plugins/sceditor/minified/sceditor.min.js"></script>

		';


define('FOOTHER',$foother);
define('MENU',$menu_s);

	$head .= '
			<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
			<script type="text/javascript" src="assets/js.cookie.js"></script>
			';

	if(lugar()=="index" || lugar()==""){
		//js req
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
			<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
			<script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
			<script type="text/javascript" src="assets/js/pages/layout_sidebar_sticky_custom.js"></script>
			</head>';
			include("dashboard.php");
	}elseif(lugar()=="newcrono"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/uploaders/dropzone.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/handsontable/handsontable.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/handsontable/languages.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/newcrono.js"></script>
			</head>';
	}elseif(lugar()=="listCrono"){
		$head .= '
			<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			</head>
			';
	}elseif(lugar()=="archivos"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/uploaders/dropzone.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/archivos.js"></script>
			</head>
			';
	}elseif(lugar()=="miscursos"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/handsontable/handsontable.min.js"></script>


			<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/miscursos.js"></script>
			</head>
			';
	}elseif(lugar()=="configuracion"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/uploaders/dropzone.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/configuracion.js"></script>
			</head>
			';
		

	}elseif(lugar()=="academico"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/uploaders/dropzone.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/academico.js"></script>
			</head>
			';
		}


	elseif(lugar()=="docentes"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/editable/editable.min.js"></script>			
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
			<script type="text/javascript" src="assets/js/pages/docentes.js"></script>
			</head>
			';
	}


	elseif(lugar()=="inscripcion"){
		$head .= '
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/editable/editable.min.js"></script>			
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/wizards/steps.min.js"></script>

			<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/inputs/inputmask.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
			<script type="text/javascript" src="assets/js/pages/inscripcion.js"></script>
			</head>
			';
	}

	elseif(lugar()=="data"){
		$head .= '		
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/data.js"></script>
			</head>
			';
	}	

	define('HEAD',$head);