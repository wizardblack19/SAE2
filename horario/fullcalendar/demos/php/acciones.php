 	<?php
 session_start();

$confirmado="false";
$checked="false";


 	if (isset($_SESSION['admin'])) {
 		$confirmado="true";
 			
 	}
    


include 'db.php';
if (isset($_GET['view'])) {
    $amb=$_GET['view'];
}


   
if(isset($_POST['action']) or isset($_GET['view']) or isset($_GET['vieww']) or isset($_GET['checked'])) //show all events
{   
    if (isset($_GET['vieww'])) 
 		{  
 			if($_GET['confirmado']=="true")
 			{
 				$confirmado="true";	
 			}
 			else
 			{
 				$confirmado="false";	
 			}
 		
            $amb=  mysqli_real_escape_string($connection,$_GET["vieww"]);
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblambientes` where (`events`.`amb` = $amb AND  `tblambientes`.`idAmbiente` = $amb and `events`.`confirmado` = '$confirmado') ");
            while($row = mysqli_fetch_assoc($result))
            {   

                $events[] = $row; 
            
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;
     }
       if (isset($_GET['checked'])) 
 		{  
 			$confirmado=$_GET['checked'];

 			if($confirmado=="false"){
			  $amb=  mysqli_real_escape_string($connection,$_GET["ambiente"]);
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblambientes` where (`events`.`amb` = $amb AND  `tblambientes`.`idAmbiente` = $amb and `events`.`confirmado` = '$confirmado') ");
            while($row = mysqli_fetch_assoc($result))
            {   

                $events[] = $row; 
            
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;
 				
 			}
 			if($confirmado=="true"){
			  $amb=  mysqli_real_escape_string($connection,$_GET["ambiente"]);
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblambientes` where (`events`.`amb` = $amb AND  `tblambientes`.`idAmbiente` = $amb and `events`.`confirmado` = '$confirmado') ");
            while($row = mysqli_fetch_assoc($result))
            {   

                $events[] = $row; 
            
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;
 				
 			}

 			
     }
   


        /*--=============BUSQUEDA DE HORARIO SEGUN INSTRUCTOR ESPECIFICO


        $ins=1195;
            $amb=  mysqli_real_escape_string($connection,$_GET["vieww"]);
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblambientes`, `tblinstructores` where (`events`.`amb` = $amb AND  `tblambientes`.`idAmbiente` = $amb AND  `tblinstructores`.`ins_nrodocumento` = $ins AND  `events`.`instructor` = $ins)");
            while($row = mysqli_fetch_assoc($result))
            {   

                $events[] = $row; 
            
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;*/
   

    if(isset($_GET['view']))
    {	
       	   
            $start = mysqli_real_escape_string($connection,$_GET["start"]);
            $end = mysqli_real_escape_string($connection,$_GET["end"]);
            
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color` FROM  `events`, `tblambientes` where ((date(start) >= '$start' AND date(start) <= '$end')  AND `events`.`amb` = $amb and  `tblambientes`.`idAmbiente` = $amb  and `events`.`confirmado` ='$confirmado' ");
            while($row = mysqli_fetch_assoc($result))
            {
                $events[] = $row; 
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;
        
    }
   
    elseif($_POST['action'] == "add") // add new event
    {   
    	 $ambbb= $_GET['ambiente'];
         $color= $_POST['color'];
         $ins=$_POST['instructor'];
         $des=$_POST['descripcion'];
         $title=mysqli_real_escape_string($connection,$_POST["title"])." INSTRUCTOR: ". $ins . " DESCRIPCION: ".$des;
        mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `amb`,
                    `color`,
                    `instructor`,
                    `confirmado`                 
                    )
                    VALUES ('$title','".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                    '$ambbb','$color','$ins', '$confirmado')");

      

         
 
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($connection).'"}';
        
       

        exit;
    }
    else
    if($_POST['action'] == "update")  // update event
    {    
    	

 	try
    {	//====CONFIRMAR HORARIO===     	

    	mysqli_query($connection,"UPDATE `events` set 
        `start` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
        `end` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
        where id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;

    } catch (Exception $e)
     {
        echo $e;
    }
      
    }
    elseif($_POST['action'] == "delete")  // remove event
    {
        mysqli_query($connection,"DELETE from `events` where id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
        }
        exit;
    }
}
?>