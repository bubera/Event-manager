<?php
	session_start();
	include("conexion.php");
    if ($_REQUEST['user']!=''){
        $sql=" SELECT * FROM usuarios WHERE email = '". $_REQUEST['user'] ."' AND contrasena = '". md5($_REQUEST['pass']) ."' ;";
        $rs= mysqli_query($db, $sql);
        if ($rs){
            
            $r = mysqli_fetch_array($rs);
            if ($r['email']!=''){
                $_SESSION["user_id"] = $r['idusuarios'];
                $_SESSION["nombre"] = $r['nombre'];
                $_SESSION["user"] = $r['tipo_user'];
                $_SESSION["email"] = $r['email'];
                session_write_close;
                header('location: ../index.php');
            }
        }
    }
    else {
        header('../index.php');
    }
    if ($_REQUEST['logout'] == 'true'){
        session_destroy();
        header('location: ../index.php');
    }
?>