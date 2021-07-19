
<?php if(isset($_SESSION['empleado']) && $_SESSION['empleado'] == 'complete'): ?>
    <strong class="alert_green">La planilla de empleado se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['empleado']) && $_SESSION['empleado'] != 'complete'): ?>
    <strong class="alert_red">La planilla de empleado NO se ha creado </strong>
<?php endif; ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">La planilla de empleado se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">La planilla de empeado NO se ha borrado </strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<
<br>
<br>
<br>
<br>

<div class="w3-container">
    <h1>Gestión de Empleados</h1>

    <a href="<?=base_url?>empleado/crear" class="w3-bar-item w3-button"><i class="fa fa-th"></i>Planilla de empleados</a>

    <div class="w3-container" >
        <table class="w3-table w3-bordered w3-striped">
        <tr>
            <th>DNI</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>TIPO DE LICENCIA</th>
            <th>TIPO DE EMPLEADO</th>

        </tr>

        <?php

        while($pro = $empleados->fetch_object()): ?>
            <tr>
                <td><?=$pro->dni;?></td>
                <td><?=$pro->nombre;?></td>
                <td><?=$pro->apellido;?></td>
                <td><?=$pro->fecha_nacimiento;?></td>
                <td><?=$pro->tipo_licencia;?></td>
                <td><?=$pro->tipo_empleado;?></td>

                <td>
                    <a href="<?=base_url?>empleado/editar&id=<?=$pro->id?>" class="w3-button w3-teal">Editar</a>
                    <a href="<?=base_url?>empleado/eliminar&id=<?=$pro->id?>" class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>

                </td>

            </tr>
        <?php endwhile;?>
        </table>
    </div>
</div>



