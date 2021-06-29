<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(isset($_SESSION['proforma']) && $_SESSION['proforma'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['proforma']) && $_SESSION['proforma'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('proforma'); ?>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="signin">
        <h1>Proforma</h1>
        <p>Por favor complete los datos a continuación</p>
        <hr>
    </div>

    <form action="<?=base_url?>proforma/save" method="POST" enctype="multipart/form-data">

        <label for="numero">Número</label>
        <input type="number" name="numero" value="<?=isset($pro) && is_object($pro) ? $pro->numero : ''; ?>" required/>
        <br>
        <br>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->fecha : ''; ?>" required/>

        <hr>
        <input type="submit" class="registerbtn" value="Guardar" />

</div>
</form>




