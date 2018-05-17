 
<?php
session_start();

	$connection = new Mysqli("localhost", "root", "", "sishorario");
	$confirmado="true";
	$titulo=$_POST['title'];

 	 mysqli_query($connection,"UPDATE `events` set
    		 `confirmado` = '".mysqli_real_escape_string($connection,$confirmado)."' 
        	   where `title` = '".mysqli_real_escape_string($connection,$titulo)."' and  `amb` = ".mysqli_real_escape_string($connection,$_GET['ambiente'])."");
    		
    		echo "1";

        exit;
