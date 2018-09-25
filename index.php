<?php
if($_SERVER['HTTP_HOST']=="sae3.cecfuentedevida.net")
	if($_SERVER["HTTPS"] != "on"){
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
session_start();
include('constructor.php');
sesion();
echo HEAD;?>
<body class="navbar-bottom">
	<?php echo MENU.$pageheader;?>
	<div class="page-container">
		<div class="page-content">
			<?php echo $sidebar.$page;?>
		</div>
	</div>
	<?php echo FOOTHER;?>
</body>
</html>