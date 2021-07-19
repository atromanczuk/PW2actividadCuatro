
<?php if(isset($_SESSION['viaje']) && $_SESSION['viaje'] == 'complete'): ?>
    <strong class="alert_green">El viaje se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['viaje']) && $_SESSION['viaje'] != 'complete'): ?>
    <strong class="alert_red">El viaje NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('viaje'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El viaje se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El viaje NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="w3-container">
<h1>Gestión de viajes</h1>
<a href="<?=base_url?>viaje/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i>Agregar viaje</a>

    <div class="w3-container">

        <table class="w3-table w3-bordered w3-striped">

            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>TIEMPO REAL</th>
                <th>KILOMETROS REALES</th>
                <th>COMBUSTIBLE CONSUMIDO REAL</th>
                <th>FECHA</th>
            </tr>

            <?php

            while($pro = $viajes->fetch_object()): ?>
                <tr>
                    <td><?=$pro->origen;?></td>
                    <td><?=$pro->destino;?></td>
                    <td><?=$pro->tiempo_real;?></td>
                    <td><?=$pro->kilometros_recorridos_reales;?></td>
                    <td><?=$pro->combustible_consumido_real;?></td>
                    <td><?=$pro->fecha;?></td>

                    <td>
                        <a href="<?=base_url?>viaje/editar&id=<?=$pro->id?>" class="w3-button w3-teal">Editar</a>
                        <a href="<?=base_url?>viaje/eliminar&id=<?=$pro->id?>" class="w3-button w3-red">Eliminar</a>
                        <a href="<?=base_url?>viaje/finalizar&id=<?=$pro->id?>" class="w3-button w3-deep-purple">Finalizar Viaje</a>
                    </td>

                </tr>

            <?php endwhile;?>

        </table>
    </div>
</div>



