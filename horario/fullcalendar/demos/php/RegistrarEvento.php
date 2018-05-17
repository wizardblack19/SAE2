<?php
session_start();

$confirmado="false";
$conexion = new mysqli("localhost", "root", "", "sishorario");



 	if (isset($_SESSION['admin'])) {
 		$confirmado="true";
 			
 	}
    include 'db.php';
                
    
         $ambbb= $_GET['ambiente'];
         $ficha=$_GET['ficha'];
         $color= $_POST['color'];
         $ins=$_POST['instructor'];
         $des=$_POST['descripcion'];
         $title="COMPETENCIA: ".($_POST["title"])." ID INSTRUCTOR: ". $ins . " FICHA: ".$ficha." DESCRIPCION: ".$des;
         $start=date('Y-m-d H:i:s',strtotime($_POST["start"]));
         $end=date('Y-m-d H:i:s',strtotime($_POST["end"]));



  $query="SELECT*FROM events WHERE start='$start' and end='$end' and confirmado='$confirmado' and amb='$ambbb'";

            if($resultado=mysqli_query($conexion,$query))
            {
                $cantidad=mysqli_num_rows($resultado);                
                if ($cantidad == 0) {

                    mysqli_query($conexion,"INSERT INTO events(
                    title,
                    start,
                    end,
                    amb,
                    color,
                    instructor,
                    confirmado,
                    ficha                 
                    )
                    VALUES ('$title',
                    '$start',
                    '$end',
                    '$ambbb',
                    '$color',
                    '$ins',
                    '$confirmado',
                    '$ficha')");         
 
                    header('Content-Type: application/json');
                    echo '{"id":"'.mysqli_insert_id($conexion).'"}';
                }
                else
                {
                    header('Content-Type: application/json');
                    echo"1";
                     exit;                     
               
                }

          



            }
          

       
        
    
        exit;
           




           

?>