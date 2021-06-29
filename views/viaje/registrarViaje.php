<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(isset($_SESSION['viaje']) && $_SESSION['viaje'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['viaje']) && $_SESSION['viaje'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('viaje'); ?>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="signin">
        <h1>Viaje</h1>
        <p>Por favor complete los datos a continuación</p>
        <hr>
    </div>

    <form action="<?=base_url?>viaje/save" method="POST" enctype="multipart/form-data">
        <label for="origen">Origen</label>
        <input type="text" name="origen" value="<?=isset($pro) && is_object($pro) ? $pro->origen : ''; ?>"required/>

        <label for="destino">Destino</label>
        <input type="text" name="destino" value="<?=isset($pro) && is_object($pro) ? $pro->destino : ''; ?>" required/>

        <label for="fecha_carga">Fecha de Carga</label>
        <input type="date" name="fecha_carga" value="<?=isset($pro) && is_object($pro) ? $pro->fecha_carga : ''; ?>" required/>

        <label for="ETA">ETA</label>
        <input type="text" name="ETA" value="<?=isset($pro) && is_object($pro) ? $pro->ETA : ''; ?>" required/>

        <hr>
        <input type="submit" class="registerbtn" value="Guardar" />

</div>
</form>



