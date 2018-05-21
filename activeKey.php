<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SAE | Sistema de Gestión Educativa</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<script type="text/javascript" src="assets/js/pages/activeKey.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-bottom login-container">



	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Advanced login -->
				<form id="activeKey" action="activeKey.php" autocomplete="off">
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-slate-300 text-slate-300"><i class="icon-lock2"></i></div>
							<h5 class="content-group">Active your Software <small class="display-block">SAE</small></h5>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input name="licence" type="text" class="form-control" placeholder="KEY" required>
							<div class="form-control-feedback">
								<i class=" icon-key text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input name="secret" type="text" class="form-control" placeholder="SECRET KEY" required="required">
							<div class="form-control-feedback">
								<i class="icon-unlocked text-muted"></i>
							</div>
						</div>
						<button type="submit" class="btn btn-default btn-block content-group">Active</button>
						<span class="help-block text-center no-margin">All rights reserved <br /> 9575 N.W. 13th Street. Florida.</span>
					</div>
				</form>
				<!-- /advanced login -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->




</body>
</html>
