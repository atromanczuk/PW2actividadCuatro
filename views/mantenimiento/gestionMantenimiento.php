
<?php if(isset($_SESSION['mantenimiento']) && $_SESSION['mantenimiento'] == 'complete'): ?>
    <strong class="alert_green">El service de mantenimiento se ha agregado correctamente</strong>
<?php elseif(isset($_SESSION['mantenimiento']) && $_SESSION['mantenimiento'] != 'complete'): ?>
    <strong class="alert_red">El service de mantenimiento  NO se ha creado correctamente</strong>
<?php endif; ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El service de mantenimiento  se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El service de mantenimiento  NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<br>
<br>
<br>
<br>
<br>

<div class="w3-container">
<h1 >Gestión de Mantenimiento</h1>
<a href="<?=base_url?>mantenimiento/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i>Mantenimiento</a>

    <div class="w3-container">
        <table class="w3-table w3-bordered w3-striped">
            <tr>
                <th>ID MANTENIMIENTO</th>
                <th>FECHA DE SERVICE</th>
                <th>KILOMETROS DE LA UNIDAD</th>
                <th>COSTO</th>
                <th>SERVICE EXTERNO</th>
                <th>SERVICE INTERNO</th>
                <th>MECÁNICO</th>
                <th>REPUESTOS CAMBIADOS</th>

            </tr>

            <?php

            while($pro = $mantenimientos->fetch_object()): ?>
                <tr>
                    <td><?=$pro->id;?></td>
                    <td><?=$pro->fecha_service;?></td>
                    <td><?=$pro->km_unidad;?></td>
                    <td><?=$pro->costo;?></td>
                    <td><?=$pro->service_externo;?></td>
                    <td><?=$pro->service_interno;?></td>
                    <td><?=$pro->mecanico;?></td>
                    <td><?=$pro->repuestos_cambiados;?></td>
                    <td>
                        <a href="<?=base_url?>mantenimiento/editar&id=<?=$pro->id?>" class="w3-button w3-teal" >Editar</a>
                        <a href="<?=base_url?>mantenimiento/eliminar&id=<?=$pro->id?>" class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile;?>

        </table>
    </div>
</div>

