<?php
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