<?php
session_start();
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php
require_once '../../models/Viaje.php';?>

<?php
Utils::isAdmin();
$viaje = new Viaje();
$viajes = $viaje->getAll(); ?>

<br>
<br>
<br>
<br>
<br>
<br>
<a href="<?=base_url?>views/viaje/registrarViaje.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar viaje</a>
<div class="container">
    <table>
        <tr>
            <th>ORIGEN</th>
            <th>DESTINO</th>
            <th>FECHA DE CARGA</th>
            <th>ETA</th>

        </tr>



        <?php while($pro = $viajes->fetch_object()): ?>

            <tr>
                <td><?=$pro->origen;?></td>
                <td><?=$pro->destino;?></td>
                <td><?=$pro->fecha_carga;?></td>
                <td><?=$pro->ETA;?></td>

                </td>
                <td>
                    <a href="<?=base_url?>viaje/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                    <a href="<?=base_url?>viaje/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>

                </td>

            </tr>
        <?php endwhile; ?>
    </table>
</div>
