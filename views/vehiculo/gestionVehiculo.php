
<?php if(isset($_SESSION['vehiculo']) && $_SESSION['vehiculo'] == 'complete'): ?>
    <strong class="alert_green">El vehiculo se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['vehiculo']) && $_SESSION['vehiculo'] != 'complete'): ?>
    <strong class="alert_red">El vehiculo NO se ha creado correctamente</strong>
<?php endif; ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El vehiculo se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El vehiculo NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<br>
<br>
<br>
<br>

<div class="w3-container">
    <h1>Gestión de Vehículos</h1>

    <a href="<?=base_url?>vehiculo/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i>Agregar vehiculo</a>
    <div class="w3-container" >

    <table class="w3-table w3-bordered w3-striped">
            <tr>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>PATENTE</th>
                <th>NUMERO DE CHASIS</th>
                <th>NUMERO DE MOTOR</th>
                <th>AÑO DE FABRICACIÓN </th>
                <th>SERVICE</th>
                <th>KILOMETROS TOTALES</th>
            </tr>

            <?php

            while($pro = $vehiculos->fetch_object()): ?>
                <tr>
                    <td><?=$pro->marca;?></td>
                    <td><?=$pro->modelo;?></td>
                    <td><?=$pro->patente;?></td>
                    <td><?=$pro->nro_chasis;?></td>
                    <td><?=$pro->nro_motor;?></td>
                    <td><?=$pro->anio_fabricacion;?></td>
                    <td><?=$pro->calendarizacion_service;?></td>
                    <td><?=$pro->kilometros_totales;?></td>
                    <td>
                        <a href="<?=base_url?>vehiculo/editar&id=<?=$pro->id?>" class="w3-button w3-teal">Editar</a>
                        <a href="<?=base_url?>vehiculo/eliminar&id=<?=$pro->id?>" class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>

                    </td>
                </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>


