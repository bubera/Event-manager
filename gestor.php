<?php
    include ("includes/header.php");
    
    $salon_rs = mysqli_query($db, "SELECT * FROM salones WHERE idusuarios = '" . $_SESSION['user_id'] . "';");
    if ($salon_rs){
        $salon = mysqli_fetch_array($salon_rs);
        $idsalon= $salon['idsalones'];
    }
    $sql = "SELECT idturnos, turno FROM turnos WHERE idsalones= '" . $idsalon . "' AND dia = '2017-11-04' ;";
    $selectid =mysqli_query ($db, $sql);
    $datos = array(); 
    while($row = mysqli_fetch_array($selectid)){
        $datos[] = $row;
    }
    $turno_1 = array_column($datos, 1);
    $idturno = array_column ($datos, 0);
    $idturno1 = '';
    $idturno2 = '';
    $idturno3 = '';
    $idturno4 = '';
    $idturno5 = '';
    
    switch ($turno_1[0]) {
        case 1:
            $idturno1 = $idturno[0];
            break;
        case 2:
            $idturno2 = $idturno[0];
            break;
        case 3:
            $idturno3 = $idturno[0];
            break;
        case 4:
            $idturno4 = $idturno[0];
            break;
        case 5:
            $idturno5 = $idturno[0];
            break;
    }
    switch ($turno_1[1]) {
        case 1:
            $idturno1 = $idturno[1];
            break;
        case 2:
            $idturno2 = $idturno[1];
            break;
        case 3:
            $idturno3 = $idturno[1];
            break;
        case 4:
                $idturno4 = $idturno[1];
            break;
        case 5:
            $idturno5 = $idturno[1];
            break;
    }
    switch ($turno_1[2]) {
        case 1:
            $idturno1 = $idturno[2];
            break;
        case 2:
            $idturno2 = $idturno[2];
            break;
        case 3:
            $idturno3 = $idturno[2];
            break;
        case 4:
            $idturno4 = $idturno[2];
            break;
        case 5:
            $idturno5 = $idturno[2];
            break;
    }
    switch ($turno_1[3]) {
        case 1:
            $idturno1 = $idturno[3];
            break;
        case 2:
            $idturno2 = $idturno[3];
            break;
        case 3:
            $idturno3 = $idturno[3];
            break;
        case 4:
            $idturno4 = $idturno[3];
            break;
        case 5:
            $idturno5 = $idturno[3];
            break;
    }
    switch ($turno_1[4]) {
        case 1:
            $idturno1 = $idturno[4];
            break;
        case 2:
            $idturno2 = $idturno[4];
            break;
        case 3:
            $idturno3 = $idturno[4];
            break;
        case 4:
            $idturno4 = $idturno[4];
            break;
        case 5:
            $idturno5 = $idturno[4];
            break;
    }
?>
        <main>
            <div class="row">
                <div class="col-12 d-flex flex-row justify-content-around flex-wrap">
                        <a class="gestor-tab" data-value="1" href="#">Mis Datos</a>
                        <a class="gestor-tab activo" data-value="2" href="#">Mi gestion</a>
                        <a class="gestor-tab" data-value="3" href="#">Pendientes</a>
                </div>
            </div>
                   <!-- Gestion activo por defecto -->
            <section class="gestion">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center my-4">
                        <i class="fa fa-chevron-left calendar"></i>
                        <i class="fa fa-calendar calendar"></i>
                        <i class="fa fa-chevron-right calendar"></i>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" data-day='2017-11-04'>
                        <h4 class="text-center">Lunes 1</h4>
                        <?php
                        for ($i = 1; $i < 6; $i++) {
                            $turno_rs='';
                            $data= '';
                            $turno1 = '';
                                 
                        switch ($i) {
                            case 1:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno1 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno1;
                                $horario ="8:00 a 11:00";
                                break;
                            
                            case 2:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno2 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno2;
                                $horario ="11:00 a 14:00";
                                break;
                            case 3:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno3 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno3;
                                $horario ="14:00 a 17:00";
                                break;
                            case 4:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno4 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno4;
                                $horario ="17:00 a 20:00";
                                break;
                            case 5:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno5 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno5;
                                $horario ="20:00 a 23:00";
                                break;
                        }
                        if ($turno_rs){
                            $comentario = $data['comentario'];
                            $estado = $data['estado'];
                            $sena = $data['sena'];
                            $saldo = $data['saldo'];
                        }
                        ?>
                        <div class="reservation-container" id="res_<?php
                        if ($turno){
                            echo $turno;
                            }
                            else{
                                echo "turno" . $i ;
                            }
                        ?>" data-turno="<?php echo $i ?>">
                            <p class="w-100 text-center mb-1 <?php   if ($estado == 1){
                                    echo 'reserved';
                                    }
                                    elseif ($estado == 2){
                                        echo 'pending';
                                    }
                                    else{
                                        echo 'free';
                                    }
                                    ?>"><?php echo $horario ?></p>
                            <div class="d-flex flex-column justify-content-between">
                                <textarea class="reservation-description" readonly><?php
                                    echo $comentario;
                                ?></textarea>
                                
                                <!-- display -->
                                <div class="<?php
                                    if($turno){
                                        echo 'd-flex';
                                    }
                                    else{
                                        echo 'd-none';
                                    }
                                ?> flex-row justify-content-around mt-3 display">
                                    <p class="reservation-buttons edit"  >Editar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <p class="sena_fixed"><?php
                                            echo $sena;
                                        ?></p> 
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <p class="saldo_fixed"><?php
                                            echo $saldo;
                                        ?></p>
                                    </div>
                                    <p class="reservation-buttons cancel-res" data-from="<?php echo $turno ?>">Cancelar</p>
                                </div>
                                
                                <!-- edicion -->
                                <div class="d-none flex-row flex-nowrap justify-content-around mt-3 edition">
                                    <p class="reservation-buttons accept" data-from="<?php echo $turno ?>">Aceptar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <input type="number" name="sena" class="sena w-50 h-50" value="<?php
                                            echo $sena;
                                        ?>">
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <input type="number" name="saldo" class="saldo w-50 h-50" value="<?php
                                            echo $saldo;
                                        ?>">
                                    </div>
                                    <p class="reservation-buttons cancel-upd" >Cancelar</p>
                                </div>
                                
                                <!-- agregar reserva -->
                                <div class="<?php
                                    if(!$turno){
                                        echo 'd-flex';
                                    }
                                    else{
                                        echo 'd-none';
                                    }
                                ?> flex-row justify-content-around mt-3 adition">
                                    <p class="reservation-buttons add" >Agregar</p>
                                </div>
                                
                                <!-- agregar edicion -->
                                <div class="d-none flex-row flex-nowrap justify-content-around mt-3 adition_plus">
                                    <p class="reservation-buttons accept-add" >Aceptar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <input type="number" name="add_sena" class="add_sena w-50 h-50" value="0">
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <input type="number" name="add_saldo" class="add_saldo w-50 h-50" value="0">
                                    </div>
                                    <p class="reservation-buttons cancel-res" data-from="<?php echo $turno ?>">Cancelar</p>
                                </div>
                            </div>
                        </div>
                    
                        <?php } ?>
                    </div>
                        
<?php
$sql2 = "SELECT idturnos, turno FROM turnos WHERE idsalones= '" . $idsalon . "' AND dia = '2017-11-05' ;";
    $selectid2 =mysqli_query ($db, $sql2);
    $data2 = array(); 
    while($row2 = mysqli_fetch_array($selectid2)){
        $data2[] = $row2;
    }
    $turno_2 = array_column($data2, 1);
    $idturno_2 = array_column ($data2, 0);
    $idturno6 = '';
    $idturno7 = '';
    $idturno8 = '';
    $idturno9 = '';
    $idturno10 = '';
    switch ($turno_2[0]) {
        case 1:
            $idturno6 = $idturno_2[0];
            break;
        case 2:
            $idturno7 = $idturno_2[0];
            break;
        case 3:
            $idturno8 = $idturno_2[0];
            break;
        case 4:
            $idturno9 = $idturno_2[0];
            break;
        case 5:
            $idturno10 = $idturno_2[0];
            break;
    }
    switch ($turno_2[1]) {
        case 1:
            $idturno6 = $idturno_2[1];
            break;
        case 2:
            $idturno7 = $idturno_2[1];
            break;
        case 3:
            $idturno8 = $idturno_2[1];
            break;
        case 4:
            $idturno9 = $idturno_2[1];
            break;
        case 5:
            $idturno10 = $idturno_2[1];
            break;
    }
    switch ($turno_2[2]) {
        case 1:
            $idturno6 = $idturno_2[2];
            break;
        case 2:
            $idturno7 = $idturno_2[2];
            break;
        case 3:
            $idturno8 = $idturno_2[2];
            break;
        case 4:
            $idturno9 = $idturno_2[2];
            break;
        case 5:
            $idturno10 = $idturno_2[2];
            break;
    }
    switch ($turno_2[3]) {
        case 1:
            $idturno6 = $idturno_2[3];
            break;
        case 2:
            $idturno7 = $idturno_2[3];
            break;
        case 3:
            $idturno8 = $idturno_2[3];
            break;
        case 4:
            $idturno9 = $idturno_2[3];
            break;
        case 5:
            $idturno10 = $idturno_2[3];
            break;
    }
    switch ($turno_2[4]) {
        case 1:
            $idturno6 = $idturno_2[4];
            break;
        case 2:
            $idturno7 = $idturno_2[4];
            break;
        case 3:
            $idturno8 = $idturno_2[4];
            break;
        case 4:
            $idturno9 = $idturno_2[4];
            break;
        case 5:
            $idturno10 = $idturno_2[4];
            break;
    }
?>
                    <div class="d-none d-md-inline-block col-md-6" data-day='2017-11-05'>
                        <h4 class="text-center">Martes 2</h4>
                        <?php
                        for ($i = 1; $i < 6; $i++) {
                            $turno_rs='';
                            $data= '';
                            $turno2 = '';
                                 
                        switch ($i) {
                            case 1:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno6 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno6;
                                $horario ="8:00 a 11:00";
                                break;
                            
                            case 2:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno7 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno7;
                                $horario ="11:00 a 14:00";
                                break;
                            case 3:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno8 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno8;
                                $horario ="14:00 a 17:00";
                                break;
                            case 4:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno9 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno9;
                                $horario ="17:00 a 20:00";
                                break;
                            case 5:
                                $turno_rs = mysqli_query ($db, "SELECT * FROM turnos WHERE idturnos = '" . $idturno10 . "' ;");
                                $data = mysqli_fetch_array($turno_rs);
                                $turno = $idturno10;
                                $horario ="20:00 a 23:00";
                                break;
                        }
                        if ($turno_rs){
                            $comentario = $data['comentario'];
                            $estado = $data['estado'];
                            $sena = $data['sena'];
                            $saldo = $data['saldo'];
                        }
                        ?>
                        <div class="reservation-container" id="res_<?php
                            if ($turno){
                                echo $turno;
                                }
                                else{
                                    echo 'turno' . $i ;
                                }
                            ?>" data-turno="<?php echo $i ?>">
                            <p class="w-100 text-center mb-1 <?php   if ($estado == 1){
                                    echo 'reserved';
                                    }
                                    elseif ($estado == 2){
                                        echo 'pending';
                                    }
                                    else{
                                        echo 'free';
                                    }
                                    ?>"><?php echo $horario ?></p>
                            <div class="d-flex flex-column justify-content-between">
                                <textarea class="reservation-description" readonly><?php
                                    echo $comentario;
                                ?></textarea>
                                
                                <!-- display -->
                                <div class="<?php
                                    if($turno){
                                        echo 'd-flex';
                                    }
                                    else{
                                        echo 'd-none';
                                    }
                                ?> flex-row justify-content-around mt-3 display">
                                    <p class="reservation-buttons edit"  >Editar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <p class="sena_fixed"><?php
                                            echo $sena;
                                        ?></p> 
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <p class="saldo_fixed"><?php
                                            echo $saldo;
                                        ?></p>
                                    </div>
                                    <p class="reservation-buttons cancel-res" data-from="<?php echo $turno ?>">Cancelar</p>
                                </div>
                                
                                <!-- edicion -->
                                <div class="d-none flex-row flex-nowrap justify-content-around mt-3 edition">
                                    <p class="reservation-buttons accept" data-from="<?php echo $turno ?>">Aceptar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <input type="number" name="sena" class="sena w-50 h-50" value="<?php
                                            echo $sena;
                                        ?>">
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <input type="number" name="saldo" class="saldo w-50 h-50" value="<?php
                                            echo $saldo;
                                        ?>">
                                    </div>
                                    <p class="reservation-buttons cancel-upd" >Cancelar</p>
                                </div>
                                
                                <!-- agregar reserva -->
                                <div class="<?php
                                    if(!$turno){
                                        echo 'd-flex';
                                    }
                                    else{
                                        echo 'd-none';
                                    }
                                ?> flex-row justify-content-around mt-3 adition">
                                    <p class="reservation-buttons add" >Agregar</p>
                                </div>
                                
                                <!-- agregar edicion -->
                                <div class="d-none flex-row flex-nowrap justify-content-around mt-3 adition_plus">
                                    <p class="reservation-buttons accept-add" >Aceptar</p>
                                    <div class="d-inline-flex flex-row">
                                        <p>Seña: $</p>
                                        <input type="number" name="add_sena" class="add_sena w-50 h-50" value="0">
                                    </div>
                                    <div class="d-inline-flex flex-row">
                                        <p>Saldo: $</p>
                                        <input type="number" name="add_saldo" class="add_saldo w-50 h-50" value="0">
                                    </div>
                                    <p class="reservation-buttons cancel-res" data-from="<?php echo $turno ?>">Cancelar</p>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- Fin de Gestion -->
            <!-- Comienzo de datos tab -->
            <section class="datos d-none">
                <div class="row">
                    <div class="col">
                        <form class="datos_form" <?php
                        if ($idsalon){
                            echo "action='upd_salon.php'";
                        }
                        else{
                            echo "action='add_salon.php'";
                        }
                        ?> method="post" enctype="multipart/form-data">
                            <div class="d-block">
                                <input class="w-75 d-block" type="text" name="title" required value=" <?php echo $salon['nombre'];?>"> 
                                
                                <label for="title" class="mb-4">Nombre del salon/servicio*</label>
                            </div>
                            <div class="d-block">
                                <label for="firstimg" class="mb-0">Imagen principal*</label>
                                <input type="file" accept="image/*" name="firstimg" class="datos_input mb-4"  <?php if(!$salon['first_img']){ echo 'required'; } ?> />
                                <?php echo "<img class='muestra my-5' src=' " . $salon['first_img'] . "' >" ?>
                            </div>
                            <div class="d-block">
                                <label for="imagen1" class="mt-3 mb-0">Imagen 1:</label>
                                <input type="file" name="imagen1" accept="image/*"  class="datos_input mb-4" />
                                <?php echo "<img class='muestra my-5' src=' " . $salon['imagen1'] . "' >" ?>
                            </div>
                            <div class="d-block">
                                <label for="imagen2" class="mt-3 mb-0">Imagen 2:</label>
                                <input type="file" name="imagen2" accept="image/*"  class="datos_input mb-4" />
                                <?php echo "<img class='muestra my-5' src=' " . $salon['imagen2'] . "' >" ?>
                            </div>
                            <div class="d-block">
                                <label for="imagen3" class="mt-3 mb-0">Imagen 3:</label>
                                <input type="file" name="imagen3" accept="image/*"  class="datos_input mb-4" />
                                <?php echo "<img class='muestra my-5' src=' " . $salon['imagen3'] . "' >" ?>
                            </div>
                            <div class="d-block">
                                <label for="imagen4" class="mt-3 mb-0">Imagen 4:</label>
                                <input type="file" name="imagen4" accept="image/*"  class="datos_input mb-4" /><?php echo "<img class='muestra my-5' src=' " . $salon['imagen4'] . "' >" ?>
                            </div>
                            <div class="d-block">
                                <label for="imagen5" class="mt-3 mb-0">Imagen 5:</label>
                                <input type="file" name="imagen5" accept="image/*"  class="datos_input mb-4" />
                                <?php echo "<img class='muestra my-5' src=' " . $salon['imagen5'] . "' >" ?>
                            </div>
                            <div class="d-block mt-3">
                                <label for="description">Descripcion del salon</label>
                                <textarea name="description"><?php echo $salon['descripcion'] ?></textarea>
                            </div>
                            <div class="d-block">
                                <label for="salon_tipo">Tipo de salon:</label>
                                <select name="salon_tipo" class="mdb-select" >
                                    <option value="1" <?php if($salon['tipo_salon'] == 1){ echo 'selected'; } ?> >Salon de Fiestas</option>
                                    <option value="2" <?php if($salon['tipo_salon'] == 2){ echo 'selected'; } ?> >Salon infantil</option>
                                    <option value="3" <?php if($salon['tipo_salon'] == 3){ echo 'selected'; } ?> >Quincho</option>
                                    <option value="4" <?php if($salon['tipo_salon'] == 4){ echo 'selected'; } ?> >Hotel</option>
                                </select>
                            </div>
                            <div class="d-block">
                                <input class="w-75 d-block" type="text" name="direction" required value='<?php echo $salon['domicilio'] ?>'>
                                <label for="direction">Direccion</label>
                            </div>
                            <div class="d-block">
                                <input class="w-75 d-block" type="tel" name="telephone" required value='<?php echo $salon['telefono'] ?>'>
                                <label for="telephone">Telefono</label>
                            </div>
                            <div class="d-block">
                                <label for="capacidad">Capacidad:</label>
                                <select name="capacidad" class="mdb-select" >
                                    <option value="1" <?php if($salon['capacidad'] == 1){ echo 'selected'; } ?> >Mas de 300</option>
                                    <option value="2" <?php if($salon['capacidad'] == 2){ echo 'selected'; } ?> >Entre 200 y 300</option>
                                    <option value="3" <?php if($salon['capacidad'] == 3){ echo 'selected'; } ?> >Entre 100 y 200</option>
                                    <option value="4" <?php if($salon['capacidad'] == 4){ echo 'selected'; } ?> >Entre 50 y 100</option>
                                    <option value="5" <?php if($salon['capacidad'] == 5){ echo 'selected'; } ?> >Menos de 50</option>
                                </select>
                            </div>
                            <div class="d-block">
                                <label for="price">Capacidad:</label>
                                <select name="price" class="mdb-select" >
                                    <option value="1" <?php if($salon['valor'] == 1){ echo 'selected'; } ?> >Mas de $8000</option>
                                    <option value="2" <?php if($salon['valor'] == 2){ echo 'selected'; } ?> >Entre $5000-$8000</option>
                                    <option value="3" <?php if($salon['valor'] == 3){ echo 'selected'; } ?> >Entre $3000-$5000</option>
                                    <option value="4" <?php if($salon['valor'] == 4){ echo 'selected'; } ?> >Menos de $3000</option>
                                </select>
                            </div>
                            <p class="text-center">Servicios</p>
                            <div class="row datos_checkbox">
                                <div class="col-6 col-lg-3">
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php
                                        $pos = strpos($salon['servicios'], '1!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="1"/>
                                        <label for="services[]">Pelotero estructural</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php
                                        $pos = strpos($salon['servicios'], '!2!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="2"/>
                                        <label for="services[]">Inflables</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php
                                        $pos = strpos($salon['servicios'], '!3!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="3"/>
                                        <label for="services[]">Cancha de Futbol</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php
                                        $pos = strpos($salon['servicios'], '!4!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="4"/>
                                        <label for="services[]">Chancha de basquet</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!5!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="5"/>
                                        <label for="services[]">Video juegos</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!6!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="6"/>
                                        <label for="services[]">Pared escaladora</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!7!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="7"/>
                                        <label for="services[]">Plaza blanda</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!8!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="8"/>
                                        <label for="services[]">Metegol</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!9!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="9"/>
                                        <label for="services[]">Bungee Jump</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!10!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="10"/>
                                        <label for="services[]">Tirolesa</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!11!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="11"/>
                                        <label for="services[]">Cama elastica</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!12!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="12"/>
                                        <label for="services[]">Tobogan</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!13!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="13"/>
                                        <label for="services[]">Mesa de tejo</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!14!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="14"/>
                                        <label for="services[]">Spa de nenas</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!15!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="15"/>
                                        <label for="services[]">Invitaciones</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!16!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="16"/>
                                        <label for="services[]">Karaoke</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!17!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="17"/>
                                        <label for="services[]">Pista de Baile</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!18!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="18"/>
                                        <label for="services[]">Luces LED</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!19!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="19"/>
                                        <label for="services[]">Proyector</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!20!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="20"/>
                                        <label for="services[]">Cotillon</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!21!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="21"/>
                                        <label for="services[]">Animador</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!22!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="22"/>
                                        <label for="services[]">Camareros</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!23!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="23"/>
                                        <label for="services[]">Disc Jockey</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!24!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="24"/>
                                        <label for="services[]">Fotografo</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!25!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="25"/>
                                        <label for="services[]">Cocina</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!26!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="26"/>
                                        <label for="services[]">Vajilla</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!27!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="27"/>
                                        <label for="services[]">Catering</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!28!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="28"/>
                                        <label for="services[]">Aire Acondicionado</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!29!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="29"/>
                                        <label for="services[]">Wifi</label>
                                    </div>
                                    <div class="d-block">
                                        <input type="checkbox" name="services[]" <?php $pos = strpos($salon['servicios'], '!30!');
                                        if ($pos==true){ echo "checked"; }
                                        ?> value="30"/>
                                        <label for="services[]">Servicio Medico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block">
                                <input type="text" name="other_services" value='<?php echo $salon['servicios_plus'] ?>'>
                                <label for="other_services">Servicios adicionales</label>
                            </div>
                            <?php 
                                if ($idsalon){
                                    echo "<input type='number' name='id' class='d-none' value='" . $idsalon . "'/>
                                    <input type='submit' value='Actualizar datos' />";
                                }
                                else{
                                    echo "<input type='submit' value='Cargar datos' />";
                                }
                            ?>
                            <!-- agregar nuevo salon -->
                        </form>
                        
                    </div>
                </div>
            </section>
            <section class="pendientes d-none">
            </section>
        </main>
    </div>
        <footer class="page-footer center-on-small-only stylish-color-dark">
            <div class="social-section text-center">
                <ul>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-facebook rounded-circle"> </i></a></li>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-twitter rounded-circle"> </i></a></li>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-google-plus rounded-circle"></i></a></li>
                </ul>
            </div>
                <div class="container-fluid text-center">
                    &copy 2017 Salon Manager
                </div>
            </div>        
        </footer>  
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/jquery.rateyo.min.js"></script>
        <script type="text/javascript" src="js/myjs.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>