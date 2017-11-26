<?php
	session_start();
    include("includes/conexion.php");
    if ($_FILES) {
	$carpeta = "uploads/";
	$destino = $carpeta . $_SESSION['user_id'] . $_FILES['firstimg']['name'];	
	move_uploaded_file($_FILES['firstimg']['tmp_name'], $destino);
	$destino2 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen1']['name'];
	move_uploaded_file($_FILES['imagen1']['tmp_name'], $destino2);
	$destino3 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen2']['name'];
	move_uploaded_file($_FILES['imagen2']['tmp_name'], $destino3);
	$destino4 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen3']['name'];
	move_uploaded_file($_FILES['imagen3']['tmp_name'], $destino4);
	$destino5 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen4']['name'];
	move_uploaded_file($_FILES['imagen4']['tmp_name'], $destino5);
	$destino6 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen5']['name'];
	move_uploaded_file($_FILES['imagen5']['tmp_name'], $destino6);
    }
    $checkbox = $_REQUEST['services'];
    $checked= '!';
    foreach ($checkbox as $check){
    	$cheked .= $check . "!";
    }
    if ($_FILES !='') {
    	$imagenes = " first_img = ' $destino ', imagen1= ' $destino2 ', imagen2= ' $destino3 ',  imagen3= ' $destino4 ', imagen4= '  $destino5 ', imagen5= ' $destino6 ', ";
    }
    $sql = "UPDATE salones SET nombre = '" . $_REQUEST['title'] . "', $imagenes descripcion= '" . $_REQUEST['description'] . "', domicilio= '" . $_REQUEST['direction'] . "', telefono= '" . $_REQUEST['telephone'] . "', capacidad= '" . $_REQUEST['capacidad'] . "', valor= '" . $_REQUEST['price'] . "', servicios= '!" . $cheked . "', servicios_plus= '" . $_REQUEST['other_services'] . "' WHERE idsalones = '" . $_REQUEST['id'] . "' ;";
    $rs = mysqli_query($db, $sql);
  	header('location: gestor.php');
    // tirar un update con exito
    
    

?>