<?php
session_start();
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php
require_once '../../models/Carga.php';?>

<?php
Utils::isAdmin();
$carga = new Carga();
$cargas = $carga->getAll(); ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="<?=base_url?>views/carga/registrarCarga.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar Carga</a>

<div class="container">

    <table>
        <tr>
            <th>TIPO</th>
            <th>PESO NETO</th>
            <th>HAZARD</th>
            <th>REEFER</th>
            <th>TEMPERATURA</th>
            <th>IMOCLASS</th>
            <th>IMOSCLASS</th>

        </tr>
        <?php while($pro = $cargas->fetch_object()): ?>

            <tr>
                <td><?=$pro->tipo;?></td>
                <td><?=$pro->peso_neto;?></td>
                <td><?=$pro->hazard;?></td>
                <td><?=$pro->reefer;?></td>
                <td><?=$pro->temperatura;?></td>
                <td><?=$pro->IMOClass;?></td>
                <td><?=$pro->IMOSclass;?></td>

                </td>
                <td>
                    <a href="<?=base_url?>carga/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                    <a href="<?=base_url?>carga/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>

                </td>

            </tr>
        <?php endwhile; ?>
    </table>
</div>