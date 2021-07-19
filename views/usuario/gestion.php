
<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'complete'): ?>
    <strong class="alert_green">El Usuario se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'complete'): ?>
    <strong class="alert_red">El Usuario NO se ha creado correctamente</strong>
<?php endif; ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El Usuario se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El Usuario NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<br>
<br>
<br>
<br>
<br>
<a href="<?=base_url?>usuario/registro" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar usuario</a>

<div class="w3-container">
    <h1>Gestión de Usuarios</h1>
    <a href="<?=base_url?>usuario/registro" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Agregar usuario</a>

    <div class="w3-container">

        <table class="w3-table w3-bordered w3-striped">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>EMAIL</th>
                <th>ROL</th>
            </tr>


            <?php while($pro = $usuarios->fetch_object()): ?>

                <tr>
                    <td><?=$pro->id;?></td>
                    <td><?=$pro->nombre;?></td>
                    <td><?=$pro->apellidos;?></td>
                    <td><?=$pro->email;?></td>
                    <td><?=$pro->rol;?>
                    </td>
                    <td>
                        <a href="<?=base_url?>usuario/editar&id=<?=$pro->id?>"  class="w3-button w3-teal">Editar</a>
                        <a href="<?=base_url?>usuario/eliminar&id=<?=$pro->id?>"  class="w3-button w3-red" style="margin-left: 1px;">Eliminar</a>

                    </td>

                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>