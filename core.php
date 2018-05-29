<?php
include("funciones.php");
//Multi-proceso
//Variable de control Global
	if(isset($_GET['l'])){
		$proceso = $_GET['l'];
	}else{
		$proceso = "";
	}
    $data = array();
	//Procesos
	if($proceso == "upload_file"){
		if (!empty($_FILES)) {
      $codigo = $_POST['codigo'];
			if(!is_dir("files/"))
		    mkdir("files/", 0777);	
		  	$tempFile = $_FILES['file']['tmp_name']; 
        $namefile = $_FILES['file']['name'];

		  	$targetFile = uniqid().'.'.ext($namefile);
		  	$saveFile = 'files/'.$targetFile;
		  	if(move_uploaded_file($tempFile, $saveFile)){
          conectar();
            //Guardamos registro en base
            $idfile = uniqid();
            $sql = "INSERT into archivos (idfile, nombre, archivo, docente) VALUES ('$idfile', '$namefile',  '$targetFile', '$codigo')";
            if(mysqli_query($mysqli, $sql)){
              echo "Se guardo bien";
            }else{
              echo "algo no anda bien ".mysqli_error($mysqli);
            }
          cerrar_conex();
        }else{
          echo "Error al guardar";
        }

		}
		exit;
	}





  elseif ($proceso == "SaveIndividualCrono") {
    $dataForm =   $_POST['datos'];
    $curso    =   $dataForm['curso'];
    $docente  =   $dataForm['docente'];
    $seccion  =   $dataForm['seccion'];
    $unidad   =   $dataForm['unidad'];
    $id       =   $dataForm['id'];
    $estado   =   $dataForm['estado'];
    $key      =   uniqid();
	  $crono    =   json_encode($dataForm);
    $fecha    =   date('Y-m-d H:i:s');
    conectar();
  if($id==0){
    if ($guardar = $mysqli->prepare("INSERT into crono_key (curso, seccion, unidad, estado, llave) VALUES (?,?,?,?,?)")) {
        $guardar->bind_param('ssiis', $curso, $seccion, $unidad, $estado, $key);
        $guardar->execute();
        $idK = $mysqli->insert_id;
        $data['idK'] = $idK;
    }
    if(isset($idK)){
      if ($guardar = $mysqli->prepare(" INSERT into crono_data (llave, data) VALUES (?,?) ")) {
          $guardar->bind_param('ss', $key, $crono);
          $guardar->execute();
          $idD = $mysqli->insert_id;
          $data['idD'] = $idD;
      }
      if(isset($idD)){
        $data['code']   =   "1";
        $data['alert']  =   "success";
        $data['msg']    =   "Cronograma Guardado.";
      }else{
        $data['code']   =   "0";
        $data['alert']  =   "error";
        $data['msg']    =   "No fue posible crear la DATA para este cronograma. Por favor copie el siguiente numero y entregue al administrador de sistema. \n ID error:".$idK." \n Code: ".mysqli_error($mysqli);
      }

    }else{
      $data['code']     =   "0";
      $data['alert']    =   "error";
      $data['msg']      =   "No fue posible crear el KEY para este cronograma. \n Error: ".mysqli_error($mysqli);
    }

  }else{


      if ($guardar = $mysqli->prepare("UPDATE crono_key SET estado = ? WHERE id = ?")) {
        $guardar->bind_param('si', $estado, $dataForm['idK']);
        $guardar->execute();
      }
      
      if ($guardar = $mysqli->prepare("UPDATE crono_data SET data = ? WHERE llave = ?")) {
        $guardar->bind_param('si', $crono, $dataForm['idD']);
        $guardar->execute();
        $data['code']  = "2";
        $data['alert']  = "success";
        $data['msg'] = "Se actualizo correctamente. ";
      }else{
      $data['code']  = "0";
      $data['alert']  = "error";
      $data['msg'] = "No se logro actualizar este registro. "; 
    }
  }

  cerrar_conex();
  print json_encode($data);
  exit;


	}elseif ($proceso == "login"){

		if(isset($_POST['codigo']) && isset($_POST['pass'])){
			conectar();
        if($datos = db("select codigo,password,tipo FROM usuarios WHERE codigo = '{$_POST['codigo']}' and password = '".base64_encode($_POST['pass'])."' LIMIT 0, 1",$mysqli)){
            session_start();
            $_SESSION['codigo']   =   $_POST['codigo'];
            $_SESSION['tipo']     =   $datos[0]['tipo'];
            $data['id']     =   1;
            $data['codigo'] =   $_SESSION['codigo'];
            $data['tipo']   =   $_SESSION['tipo'];
            $data['error']  = "Sin error, acceso correcto.";
            datosG($_SESSION['codigo'], $_SESSION['tipo']);
    			}else{
            $data['id']     =   0;
            $data['error']  =   "Error en codigo o contraseña.";
          }
      cerrar_conex();
      print json_encode($data);
		}else{
			$msg = "Ups, estas intentando hacer trampa, por favor inicia sesión.";
		}
		exit;



	}elseif ($proceso == "logout") {
    salir();
  }

elseif ($proceso == "verarchivos"){
  $codigo = $_POST['codigo'];
  conectar();
    $data['html'] = tabla_archivos($codigo);
  cerrar_conex();  
    print json_encode($data);
exit;
}

elseif ($proceso == "borrar_archivo") {
    conectar();
    $archivo = db("select archivo FROM archivos where idfile = '{$_POST['id']}' LIMIT 0,1",$mysqli);
    $nombre_fichero = './files/'.$archivo[0]['archivo'];

  if(file_exists($nombre_fichero)){
    if (unlink($nombre_fichero)){
       $sql = "DELETE FROM archivos WHERE idfile LIKE '{$_POST['id']}' ";
       if (mysqli_query($mysqli, $sql)) {
          $data['msg'] = "Record deleted successfully";
       } else {
          $data['msg'] = "Error deleting record: " . mysqli_error($mysqli);
       }
      cerrar_conex();
    }


  }else {
     $data['msg'] = "algo no esta bien el archivo no existe, se borrara registro\n";

       $sql = 'DELETE FROM archivos WHERE idfile = '.$_POST['id'];
       if (mysqli_query($mysqli, $sql)) {
          $data['msg'] .= "Record deleted successfully";
       } else {
          $data['msg'] .= "Error deleting record: " . mysqli_error($mysqli);
       }

  }   
  print json_encode($data);


 
exit;
}

elseif($proceso == "ver_DOC"){
  $url = $_POST['url'];
  $data['html'] = verDOC($url);
  print json_encode($data);
exit;
}


elseif($proceso == "refreshMisCursos"){


  //Cambios de tabla en funcion archivos
    $codigo = $_POST['codigo'];
    $data['html'] = vermiscursos($codigo);
    print json_encode($data);
    cerrar_conex();



  exit;
}

elseif($proceso == "bCurso"){
    $grado    =   $_POST['grado'];
    $nivel    =   $_POST['nivel'];
    $carrera  =   $_POST['carrera'];
    $jornada  =   $_POST['jornada'];
    $seccion  =   $_POST['seccion'];
    $docente  =   $_POST['docente'];
    conectar();
    $t="";
      if($grado !="" and $nivel !="" and $jornada !=""){
        $data['html'] = cursos($grado,$nivel,$carrera,$jornada,$t,$docente,$seccion);
        $data['seccion'] = $seccion;
        $data['docente'] = $docente;

      }else{
        $data['error']  = "Algo raro pasa aquí, se esta intentando saltar las politicas de seguridad.";
      }
    cerrar_conex();
    print json_encode($data);

  exit;
}

elseif($proceso == "Asignarme"){
    $data     =   array(); 
    $docente  =   $_POST['docente'];
    $seccion  =   $_POST['seccion'];
    $codigo   =   $_POST['codigo'];
    $ciclo    =   date('Y');
    if($docente !="" and $seccion !="" and $codigo !=""){
    conectar();
    $buscar_asignacion = buscar_asignacion($codigo,$docente,$seccion);
      if($buscar_asignacion){
          $data['error_code']   =     1;
          $data['error']        =     "Ya tiene asignado este curso, no es posible asignar el mismo curso más de una vez.";
      }else{
          $guardar = saveAsignacion($codigo,$docente,$seccion);
          if($guardar == 0){
            $data['error_code']   =     1;
            $data['error']        =     "Algo raro pasó cuando se intentaba guardar está asignación, por favor repórtelo al departamento de desarrollo. \n Data: ".mysqli_error($mysqli);
          }else{
            $data['error_code']   =     0;
            $data['error']        =     "Asignación Correcta, numero de seguimiento ".$guardar;          
          }
      }
    }else{
      $data['error_code']   =     1;
      $data['error']  = "Algo raro pasa aquí, se esta intentando saltar las politicas de seguridad.";
    }
    cerrar_conex();
    print json_encode($data);
  exit;
}

elseif($proceso == "Desasignarme"){
    $data     =   array(); 
    $docente  =   $_POST['docente'];
    $seccion  =   $_POST['seccion'];
    $codigo   =   $_POST['codigo'];
    $ciclo    =   date('Y');
    if($docente !="" and $seccion !="" and $codigo !=""){
    conectar();
    $buscar_asignacion = buscar_asignacion($codigo,$docente,$seccion);
      if($buscar_asignacion){
          $borrar = borrarAsignacion($docente,$codigo,$seccion);
          if($borrar){
            $data['error_code']   =     0;
            $data['error']        =     "Se ha borrado el curso correctamente.";
          }else{
            $data['error_code']   =     1;
            $data['error']        =     "No fue posible eliminar la asignación.";           
          }


      }else{
          $data['error_code']   =     1;
          $data['error']        =     "No puede eliminar un curso que no tiene asignado, este debe ser un error.";
      }
    }else{
      $data['error_code']   =     1;
      $data['error']  = "Algo raro pasa aquí, se esta intentando saltar las politicas de seguridad.";
    }
    cerrar_conex();
    print json_encode($data);
  exit;
}


elseif($proceso == "cronograma"){
    $datos              =   json_decode(base64_decode($_POST['datos']),TRUE);
    $datos['unidad']    =   $_POST['unidad'];
    $datos['tipo']      =   $_POST['clase'];
    $datos['docente']   =   $_POST['docente'];

    conectar();
      $crono            =   cronograma($datos);
    cerrar_conex();
    $datos['html']      =   $crono['html'];    
    $datos['idK']       =   $crono['idK'] ?? 0;
    $datos['idD']       =   $crono['idD'] ?? 0;
    $datos['estado']    =   $crono['estado']; 
    print json_encode($datos);
  exit;
}






elseif($proceso == "borrarCrono"){
  $idK  =   $_POST['idK'];
  $idD  =   $_POST['idD'];



  exit;
}




elseif($proceso == "clonar"){
  $codigo   =   $_POST['codigo'];
  $tipo     =   $_POST['tipo'];
    

      $data['html']   =   vermiscursos($codigo,$tipo);

    


  print json_encode($data);
  exit;
}




//Actualiza la tabla de docentes
elseif($proceso == "verdocentes"){
$nombre=$_POST['name'];
$valor=$_POST['value'];
$pk=$_POST['pk'];
conectar();
$sql ="UPDATE `maestros` SET {$nombre} = '{$valor}' where `id`='{$pk}'";
if(mysqli_query($mysqli, $sql)){
  echo "0";
}else{
  echo "1";
}
cerrar_conex();
exit;
}



//desactivar docentes
elseif($proceso == "desactiar_docente"){
$pk=$_POST['usuario'];
conectar();
$sql ="UPDATE `maestros` SET {$nombre} = '{$valor}' where `id`='{$pk}'";
if(mysqli_query($mysqli, $sql)){
  echo "0";
}else{
  echo "1";
}
cerrar_conex();
exit;
}


//eliminar docentes
elseif($proceso == "eliminar_docente"){
$nombre=$_POST['name'];
$valor=$_POST['value'];
$pk=$_POST['pk'];
conectar();
$sql ="UPDATE `maestros` SET {$nombre} = '{$valor}' where `id`='{$pk}'";
if(mysqli_query($mysqli, $sql)){
  echo "0";
}else{
  echo "1";
}
cerrar_conex();
exit;
}























elseif($proceso == "conf"){
    $data     =   array(); 

    $data['opciones']   =   $_POST['opciones'];
    $data['minimo']     =   $_POST['minimo'];
    $data['maximo']     =   $_POST['maximo'];
    $datos              =   $_POST['titulo'];
    
    for ($i = 0; $i < count($datos); $i++) {
      $data['titulos'][] = $datos[$i];
    }

    print json_encode($data);
  exit;
}



elseif($proceso == "activeKey"){
  conectar();
  $datos = Sactivo();
  $licence  =   $_POST['licence'] ?? '0';
  $secret   =   $_POST['secret'] ?? '0';
  if($datos[0]==0){
    $active = server_status($licence, '',$secret);
    if($active['status']=="Invalid"){
      $data['error']  =   1;
      if(isset($active['description'])){
        $error = "\nError: ".$active['description'];
      }else{
        if(isset($active['message'])){
          $error = "\nError: ".$active['message']."\n Estos errores generalmente se corrigen activando la opción de reusar licencia desde su panel de control.";
        }else{
          $error = "\nVerifique su clave.";
        }
      }
      $data['estatus'] = $active['status'];
      $data['msg']    =   "NO se puede activar este producto. ".$error;
    }elseif($active['status'] == "Active"){
      $data['error']  =   0;
      $data['estatus'] = $active['status'];
      $data['msg']    =   "Producto activado correctamente.";
      saveOPkey($licence,$secret,$active['localkey']);
      cerrar_conex();
    }elseif($active['status'] == 'Suspended'){
      $data['error']  =   1;
      $data['estatus'] = $active['status'];
      $data['msg']    =   "Su producto ha sido suspendido, esto puede deberse a la falta de pago o usted incurrió en la violación de nuestra política de seguridad, para resolver este problema ingrese a su panel de control y cree un ticket o envié un correo a ventas@gtdesarrollo.com, indicando su problema.";
    }
  }else{
    $active = server_status($datos[1], $datos[3],$datos[2]);
      $data['error']  =   0;
      $data['estatus'] = $active['status'];
      $data['msg']    =   "Producto activado correctamente.";
    saveOPkey($datos[1],$datos[2],$datos[3],$datos[4]);
  }
  $data['GTDESARROLLO'] = $active;
  print json_encode($data);
  exit;
}





elseif($proceso == "editFileForm"){
  $datos['id']        =   $_POST['codigo'];
  $datos['nombre']    =   $_POST['titulo'];
  $datos['anterior']  =   $_POST['anterior'];
  $data['html']       =   editFileForm($datos);
  print json_encode($data);
exit;
  }



elseif($proceso == "updatefile"){
  $datos['id']        =   $_POST['id'];
  $datos['nombre']    =   $_POST['nombre'];
  $datos['anterior']  =   $_POST['anterior'];


  if($datos['id']){
      conectar();
        if ($guardar = $mysqli->prepare("UPDATE archivos SET nombre = ? WHERE idfile = ?")) {
          $guardar->bind_param('ss', $datos['nombre'], $datos['id']);
          $guardar->execute();
        }
      cerrar_conex();
  }



  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
  {
    $file = $_FILES['archivo']['name'];
    $file = uniqid().'.'.ext($file);
    if(!is_dir("files/")){
      mkdir("files/", 0777);
    }
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file)){

      conectar();
        if ($guardar = $mysqli->prepare("UPDATE archivos SET archivo = ? WHERE idfile = ?")) {
          $guardar->bind_param('ss', $file, $datos['id']);
          $guardar->execute();
        }
      cerrar_conex();


      unlink('files/'.$datos['anterior']);
       echo $file;//devolvemos el nombre del archivo para pintar la imagen
    }
  }else{
      throw new Exception("Error Processing Request", 1);   
  }












exit;
  }
