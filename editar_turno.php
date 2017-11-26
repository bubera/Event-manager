<?php
    session_start();
    include("includes/conexion.php");
    
    $consultaid= mysqli_query($db, "SELECT idsalones FROM salones WHERE idusuarios = '" . $_SESSION['user_id'] . "';");
    $row = $consultaid->fetch_assoc();
    $idsalon= $row['idsalones'];
    
    if($_REQUEST['add_res'] == 'true'){
    $sql= "INSERT INTO turnos (idusuarios, idsalones, dia, turno, comentario, estado, sena, saldo) VALUES ('" . $_SESSION['user_id'] . "', '" . $idsalon . "', '" . $_REQUEST['dia'] . "', '" . $_REQUEST['turno'] . "', '" . $_REQUEST['comentario'] . "', '" . $_REQUEST['estado'] . "', '" . $_REQUEST['sena'] . "', '" . $_REQUEST['saldo'] . "');";
    $rs= mysqli_query($db, $sql);
    }
    // tirar un alert para el delete..... si me sobra tiempo (ajax);
    elseif($_REQUEST['eliminar'] == 'true'){
        $delete= mysqli_query($db, "DELETE FROM turnos WHERE idturnos='" . $_REQUEST['idturno'] ."' ;");
    }
    
    elseif($_REQUEST['edit'] ==  'true'){
        $update= mysqli_query($db, "UPDATE turnos SET sena = '" . $_REQUEST['sena'] . "', saldo = '" . $_REQUEST['saldo'] . "', comentario = '" . $_REQUEST['comentario'] . "', estado = '" . $_REQUEST['estado'] . "' WHERE idturnos = '" . $_REQUEST['id'] . "' ;");   
    }
    
  ?>