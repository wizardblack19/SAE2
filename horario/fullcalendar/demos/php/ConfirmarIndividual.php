<?php


 session_start();

	$confirmado="false";


	 	if (isset($_SESSION['admin']))
	 	{
	 		$confirmado="true";
	 			
	 	}
	    

	include 'db.php';

			if(isset($_POST['idevento'])) 
    		{
    			$confirmado="true"; 
    			
	    		 mysqli_query($connection,"UPDATE `events` set
	    		 `confirmado` = '".mysqli_real_escape_string($connection,$confirmado)."' 
	        	   where id = ".mysqli_real_escape_string($connection,$_POST['idevento'])." ");
	    		
	    		echo "1";

		        exit;

    		}


?>