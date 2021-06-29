<?php
session_start();
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php
require_once '../../models/Costeo.php';?>

<?php
Utils::isAdmin();
$costeo = new Costeo();
$costeos = $costeo->getAll(); ?>

<br>
<br>
<br>
<br>
<br>
<br>

<a href="<?=base_url?>views/costeo/registrarCosteo.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar Costeo</a>

<div class="container">
    <table>
        <tr>
            <th>KILOMETROS</th>
            <th>COMBUSTIBLE</th>
            <th>ETD</th>
            <th>ETA</th>
            <th>VIATICOS</th>
            <th>PEAJES Y PESAJES</th>
            <th>EXTRAS</th>
            <th>HAZARD</th>
            <th>REEFER</th>
            <th>FEE</th>
            <th>TOTAL</th>

        </tr>
        <?php while($pro = $costeos->fetch_object()): ?>

            <tr>
                <td><?=$pro->kilometros;?></td>
                <td><?=$pro->combustible;?></td>
                <td><?=$pro->ETD;?></td>
                <td><?=$pro->ETA;?></td>
                <td><?=$pro->viaticos;?>
                <td><?=$pro->peajesYPesajes;?></td>
                <td><?=$pro->extras;?></td>
                <td><?=$pro->hazard;?></td>
                <td><?=$pro->reefer;?></td>
                <td><?=$pro->fee;?>
                <td><?=$pro->total;?>
                </td>
                <td>
                    <a href="<?=base_url?>costeo/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                    <a href="<?=base_url?>costeo/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>

                </td>

            </tr>
        <?php endwhile; ?>
    </table>
</div>
