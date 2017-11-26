<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include("conexion.php");
	include("login.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Fernando Gonzalez Chaio">
    <meta name="description" content="Buscador y Gestionador de reservas de salones">
    <title>Event Manager</title>
    <link rel="icon" type="image/png" href="../img/globesearch.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.rateyo.min.css">
</head>
<body>
    <div class="container">
        <header>
	        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
	            <a href="index.php"><h1 class="logo">Salon Manager</h1></a>
	            <div class="d-flex justify-content-end">
	                <button class="navbar-toggler" type="button">
	                   <a href="index.php"> <i class="fa fa-home"></i></a>
	                </button>
	                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1">
	                    <i class="fa fa-search"></i>
	                </button>
	                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2">
	                    <span class="navbar-toggler-icon"></span>
	                </button>
	            </div>
	            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
	                <ul class="navbar-nav">
	                    <li class="nav-item active d-none d-lg-inline-flex">
	                        <a class="nav-link d-flex flex-row" href="index.php">Inicio</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="servicios.php">Servicios</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">Contacto</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">Ayuda</a>
	                    </li>
	                    <?php
	                    	if ($_SESSION['user'] != 1 && $_SESSION['user'] != 2 ){
	                    		echo "<li class='nav-item d-lg-none'>
				        	        <a class='nav-link' data-toggle='modal' data-target='#modalLogin' href='#'>Ingresar</a>
				                </li>
				                <li class='nav-item d-lg-none'>
				                    <a class='nav-link' data-toggle='modal' data-target='#modalRegister' href='#'>Registrarse</a>
			                    </li>";
	                    	}
	                    	elseif ($_SESSION['user'] == 2){
	                    		echo '<li class="nav-item d-lg-none">
					                	<a class="nav-link" href=../gestor.php> Gestor </a>
					                	<a class="nav-link" href=includes/login.php?logout=true> salir </a>
					                  </li>';
	                    		
	                    	}
		                	elseif ($_SESSION['user'] == 1){
		                		echo "	<li class='nav-item d-lg-none'>
		                					<p class='nav-link' >Bienvenido " . $_SESSION['nombre'] . " </p>
		                					<a class='nav-link' href=includes/login.php?logout=true> salir </a>
		                				</li>" ;
		                	}
	                    	
	                    ?>
	                </ul>
	                <?php
	                	if ($_SESSION['user'] != 1 && $_SESSION['user'] != 2){
	                		echo "
	                			<div class='logreg'>
			                		<a class='nav-link' data-toggle='modal' data-target='#modalLogin' href='#'>Ingresar</a>
				                	<a class='nav-link' data-toggle='modal' data-target='#modalRegister' href='#'>Registrarse</a>
				                </div>";
	                	}
	                	elseif ($_SESSION['user'] == 2){
	                    		echo '<div class="logreg">
					                	<a class="nav-link" href=../gestor.php> Gestor </a>
					                	<a class="nav-link" href=includes/login.php?logout=true> salir </a>
					                  </div>';
	                    		
	                    	}
	                	elseif ($_SESSION['user'] == 1){
	                		echo "	<div class='logreg'>
	                					<p class='nav-link' >Bienvenido " . $_SESSION['nombre'] . " </p>
	                					<a class='nav-link' href=includes/login.php?logout=true> salir </a>
	                				</div>" ;
	                	}
	                	
	                ?>
	            </div>
	            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	                <div class="nav-link d-lg-none">
	                    <form method="get" action="index.php">
	                        <div class="row">
	                            <div class="col-12 col-md-6">
	                                <div class="search-box">
	                                    <p class="search-title">Tipo de salones</p>
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="salon[]" value="1">
	                                            <label for="salon" >Salon de Fiestas</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="salon[]" value="2">
	                                            <label for="salon">Salon infantil</label>
	                                        </div>
	                                    </div>
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="salon[]" value="3">
	                                            <label for="salon">Quincho</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="salon[]" value="4">
	                                            <label for="salon">Hotel</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="search-box">
	                                    <p class="search-title">Capacidad</p>
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="capacidad[]" value="1">
	                                            <label for="capacidad">Mas de 300</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="capacidad[]" value="2">
	                                            <label for="capacidad">Entre 200 y 300</label>
	                                        </div>
	                                    </div>
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="capacidad[]" value="3">
	                                            <label for="capacidad">Entre 100 y 200</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="capacidad[]" value="4">
	                                            <label for="capacidad">Entre 50 y 100</label>
	                                        </div>
	                                    </div>
	                                    <div class="d-block">
	                                        <input type="checkbox" name="capacidad[]" value="5">
	                                        <label for="capacidad">Menos de 50</label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-12 col-md-6">
	                                <div class="search-box">
	                                    <p class="search-title">Rango de precio</p> 
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="valor[]" value="1">
	                                            <label for="valor">Mas de $8.000</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="valor[]" value="2">
	                                            <label for="valor">Entre $5.000-$8.000</label>
	                                        </div>
	                                    </div>
	                                    <div class="d-inline-block">
	                                        <div class="d-block">
	                                            <input type="checkbox" name="valor[]" value="3">
	                                            <label for="valor">Entre $3.000-$5.000</label>
	                                        </div>
	                                        <div class="d-block">
	                                            <input type="checkbox" name="valor[]" value="4">
	                                            <label for="valor">Menos de $3.000</label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="search-box">
	                                    <p class="search-title">Calificacion</p>
	                                    <div class="d-block">
	                                        <input type="checkbox" name="calificacion[]" value="1">
	                                        <label for="calificacion">De 8 a 10</label>
	                                    </div>
	                                    <div class="d-block">
	                                        <input type="checkbox" name="calificacion[]" value="2">
	                                        <label for="calificacion">De 5 a 8</label>
	                                    </div>
	                                    <div class="d-block">
	                                        <input type="checkbox" name="calificacion[]" value="3">
	                                        <label for="calificacion">Menor a 5</label> 
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <p class="search-title">Turno</p>
	                        <div class="d-flex flex-row justify-content-around">
	                            <div class="d-block">
	                                <input type="checkbox" name="turno" value="1">
	                                <label for="turno">Mañana</label>
	                            </div>
	                            <div class="d-block">
	                                <input type="checkbox"  name="turno" value="2">
	                                <label for="turno">Tarde</label>
	                            </div>
	                            <div class="d-block">
	                                <input type="checkbox" name="turno" value="3">
	                                <label for="turno">Noche</label> 
	                            </div>
	                        </div>
	                        <p class="search-title">Fecha</p>
	                        <div class="row">
	                            <div class="col-6">
	                                <label for="from-date">Desde</label>
	                                <div class="search-by">
	                                    <input type="date" name="from-date">
	                                </div>
	                            </div>
	                            <div class="col-6">
	                                <label for="to-date">Hasta</label>
	                                <div class="search-by">
	                                    <input type="date" name="to-date">
	                                </div>
	                            </div>
	                        </div>
	                        <div class="w-50 mx-auto mt-3">
	                            <label for="filter-nombre">Buscar por nombre</label>                            
	                            <div class="search-by">
	                                <input type="text" name="search-nombre">
	                            </div>
	                        </div>
	                        <div class="search-btn">
	                            <input type="reset" class="pb-4" value="Borrar Todo">
	                        </div>
	                        <div class="search-btn">
	                            <input type="submit" class="pb-4" value="Buscar Salones">
	                        </div>
	                    </form>                    
	                </div>
	            </div>
	        </nav>
	        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog">
	            <div class="modal-dialog cascading-modal" role="document">
	                <div class="modal-content">
	                	<form action="includes/login.php" method="post">
		                    <div class="modal-header light-blue darken-3 white-text">
		                        <h4 class="title"><i class="fa fa-user"></i> Ingresar</h4>
		                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal">
		                            <span>&times;</span>
		                        </button>
		                    </div>
		                    <div class="modal-body">
		                        <div class="md-form form-sm">
		                            <i class="fa fa-envelope prefix"></i>
		                            <input type="text" name="user" id="form30" placeholder="Email" class="form-control">
		                        </div>
		                        <div class="md-form form-sm">
		                            <i class="fa fa-lock prefix"></i>
		                            <input type="password" name="pass" id="form31" placeholder="Contraseña" class="form-control">
		                        </div>
		                        <div class="text-center mt-2">
		                            <button type="submit" class="btn btn-info">Ingresar <i class="fa fa-sign-in ml-1"></i></button>
		                        </div>
		                    </div>
		                    <div class="modal-footer">
		                        <div class="options text-center text-md-right mt-1">
		                            <p>¿No estas registrado? <a data-toggle="modal" data-target="#modalRegister" data-dismiss="modal" href="#">Registrate</a></p>
		                        </div>
		                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
		                    </div>
		            	</form>
	                </div>
	            </div>
	        </div>
	       <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog">
	            <div class="modal-dialog cascading-modal" role="document">
	                <div class="modal-content">
	                    <form action="includes/register.php" method="post">
	                        <div class="modal-header light-blue darken-3 white-text">
	                            <h4 class="title"><i class="fa fa-user-plus"></i> Registrarse</h4>
	                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal">
	                                <span>&times;</span>
	                            </button>
	                        </div>
	                        <div class="modal-body">
	                            <div class="md-form form-sm">
	                                <i class="fa fa-user prefix"></i>
	                                <input type="text" name="nombre" id="form34" placeholder="Nombre" class="form-control">
	                            </div>
	                            <div class="md-form form-sm">
	                                <i class="fa fa-user prefix"></i>
	                                <input type="text" name="apellido" id="form35" placeholder="Apellido" class="form-control">
	                            </div>
	                            <div class="md-form form-sm">
	                                <i class="fa fa-envelope prefix"></i>
	                                <input type="email" name="email" id="form32" placeholder="Email" class="form-control">
	                            </div>
	                            <div class="md-form form-sm">
	                                <i class="fa fa-lock prefix"></i>
	                                <input type="password" name="contrasena" id="form33" placeholder="Contraseña" class="form-control">
	                            </div>
	                            <div class="d-flex flex-row justify-content-around">
	                                <div>
	                                    <input type="radio" name="tipo" value="1" checked>
	                                    <label for="tipo">Usuario</label>
	                                </div>
	                                <div>
	                                    <input type="radio" name="tipo" value="2">
	                                    <label for="tipo">Salon</label>
	                                </div>
	                            </div>
	                            <div class="text-center mt-2">
	                                <button type="submit" class="btn btn-info">Registrar<i class="fa fa-sign-in ml-1"></i></button>
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <div class="options text-center text-md-right mt-1">
	                                <p>Ya tienes cuenta <a data-toggle="modal" data-target="#modalLogin" data-dismiss="modal" href="#">Ingresar</a></p>
	                            </div>
	                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
        </header>