<?php
session_start();
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php
require_once '../../models/Proforma.php';?>

<?php
Utils::isAdmin();
$proforma = new Proforma();
$proformas = $proforma->getAll(); ?>

<br>
<br>
<br>
<br>
<br>


<a href="<?=base_url?>views/proforma/registrarProforma.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar Proforma</a>

<div class="container">
    <table>
        <tr>
            <th>NÚMERO</th>
            <th>FECHA</th>

        </tr>

        <?php while($pro = $proformas->fetch_object()): ?>

            <tr>
                <td><?=$pro->numero;?></td>
                <td><?=$pro->fecha;?></td>

                <td>
                    <a href="<?=base_url?>proforma/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                    <a href="<?=base_url?>proforma/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </table>

</div>

