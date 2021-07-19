
<?php if(isset($_SESSION['chofer']) && $_SESSION['chofer'] == 'complete'): ?>
    <strong class="alert_green">El chofer se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['chofer']) && $_SESSION['chofer'] != 'complete'): ?>
    <strong class="alert_red">El chofer NO se ha creado correctamente</strong>
<?php endif; ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El chofer se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El chofer NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<br>
<br>
<br>
<br>
<br>

<div class="w3-container">
<h1>Gestión de choferes</h1>
<a href="<?=base_url?>chofer/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i>Gastos y posicion</a>
    <div class="w3-container">
        <table class="w3-table w3-bordered w3-striped">
            <tr>
                <th>LATITUD</th>
                <th>LONGITUD</th>
                <th>KILOMETROS</th>
                <th>COMBUSTIBLE</th>
                <th>VIATICOS</th>
                <th>PEAJES Y PESAJES</th>
                <th>EXTRAS</th>
                <th>FEE</th>
                <th>TOTAL</th>

            </tr>

            <?php

            while($pro = $choferes->fetch_object()): ?>
                <tr>
                    <td><?=$pro->latitud;?></td>
                    <td><?=$pro->longitud;?></td>
                    <td><?=$pro->kilometros;?></td>
                    <td><?=$pro->combustible;?></td>
                    <td><?=$pro->viaticos;?></td>
                    <td><?=$pro->peajesYPesajes;?></td>
                    <td><?=$pro->extras;?></td>
                    <td><?=$pro->fee;?></td>
                    <td><?=$pro->total ;?></td>
                    <td>
                        <a href="<?=base_url?>chofer/editar&id=<?=$pro->id?>" class="w3-button w3-teal">Editar</a>
                        <a href="<?=base_url?>chofer/eliminar&id=<?=$pro->id?>" class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>
                        <a href="<?=base_url?>chofer/posicion&id=<?=$pro->id?>" class="w3-button w3-blue" style="margin-left: 1px;">Ver posición chofer</a>
                    </td>

                </tr>



            <?php endwhile;?>

        </table>
    </div>
</div>


