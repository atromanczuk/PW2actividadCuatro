
<?php if(isset($_SESSION['proforma']) && $_SESSION['proforma'] == 'complete'): ?>
    <strong class="alert_green">La proforma se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['proforma']) && $_SESSION['proforma'] != 'complete'): ?>
    <strong class="alert_red">La proforma NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('proforma'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">La proforma se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">La proforma NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<br>
<br>
<br>
<br>
<br>

<div class="w3-container">
    <h1>Gestión de proformas</h1>
    <a href="<?=base_url?>proforma/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar Proforma</a>

    <br>
    <div class="w3-container">

        <table class="w3-table w3-bordered w3-striped">
            <tr>
                <th>NÚMERO</th>
                <th>FECHA</th>
                <th>DENOMINACIÓN</th>
                <th>CUIT</th>
                <th>EMAIL</th>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>FECHA DE CARGA</th>
                <th>TIPO</th>
                <th>TOTAL</th>

            </tr>

            <?php while($pro = $proformas->fetch_object()): ?>

            <tr>
                <td><?=$pro->numero;?></td>
                <td><?=$pro->fecha;?></td>
                <td><?=$pro->denominacion;?></td>
                <td><?=$pro->cuit;?></td>
                <td><?=$pro->email;?></td>
                <td><?=$pro->origen;?></td>
                <td><?=$pro->destino;?></td>
                <td><?=$pro->fecha_carga;?></td>
                <td><?=$pro->tipo;?></td>
                <td><?=$pro->total;?></td>
                <td>
                    <a href="<?=base_url?>proforma/editar&id=<?=$pro->id?>"  class="w3-button w3-teal">Editar</a>
                    <a href="<?=base_url?>proforma/eliminar&id=<?=$pro->id?>"  class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>
                </td>
            </tr>

            <?php endwhile; ?>
        </table>

    </div>
</div>

