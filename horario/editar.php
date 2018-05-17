<?php
	session_start();
	$page = "";
	if (isset($_GET['page'])){
		$page = $_GET['page'];
    }
?>

<?php
    if($page == 'frm_regional'){
        include 'frm/frm_regional.php';
    } elseif ($page == 'frm_centro') {
        include 'frm/frm_centro.php';
    }else{
        header
    }
?>