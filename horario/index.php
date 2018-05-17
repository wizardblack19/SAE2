<?php
session_start();

if (isset($_SESSION['admin']) ) {
	header('Location: administracion.php');
}else
{session_start();
	if (isset($_SESSION['instructor']) ) {
		header('Location: administracion.php');
	}else{
        header('Location: principal.php');
    }
}
?>
