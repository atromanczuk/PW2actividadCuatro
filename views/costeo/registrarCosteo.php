<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(isset($_SESSION['costeo']) && $_SESSION['costeo'] == 'complete'): ?>
    <strong class="alert_green">Costeo completado correctamente</strong>
<?php elseif(isset($_SESSION['costeo']) && $_SESSION['costeo'] == 'failed'): ?>
    <strong class="alert_red">Costeo fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('costeo'); ?>

<br>
<br>
<br>
<br>

<div class="container">
    <div class="signin">
        <h1 >Registrar Costeo</h1>
        <p>Por favor complete los datos a continuación</p>
        <hr>
    </div>

    <form action="<?=base_url?>costeo/save" method="POST" enctype="multipart/form-data">
        <label for="kilometros">Kilometros</label>
        <input type="text" name="kilometros" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros : ''; ?>"required/>

        <label for="combustible">Combustible</label>
        <input type="text" name="combustible" value="<?=isset($pro) && is_object($pro) ? $pro->combustible : ''; ?>" required/>

        <label for="ETD">ETD</label>
        <input type="text" name="ETD" value="<?=isset($pro) && is_object($pro) ? $pro->ETD : ''; ?>" required/>

        <label for="ETA">ETA</label>
        <input type="text" name="ETA" value="<?=isset($pro) && is_object($pro) ? $pro->ETA : ''; ?>" required/>

        <label for="viaticos">Viaticos</label>
        <input type="text" name="viaticos" value="<?=isset($pro) && is_object($pro) ? $pro->viaticos : ''; ?>" required/>

        <label for="peajesYPesajes">Peajes y Pesajes</label>
        <input type="text" name="peajesYPesajes" value="<?=isset($pro) && is_object($pro) ? $pro->peajesYPesajes : ''; ?>" required/>

        <label for="extras">Extras</label>
        <input type="text" name="extras" value="<?=isset($pro) && is_object($pro) ? $pro->extras : ''; ?>" required/>

        <label for="hazard">Hazard</label>
        <input type="text" name="hazard" value="<?=isset($pro) && is_object($pro) ? $pro->hazard : ''; ?>" required/>

        <label for="reefer">Reefer</label>
        <input type="text" name="reefer" value="<?=isset($pro) && is_object($pro) ? $pro->reefer : ''; ?>" required/>

        <label for="fee">Fee</label>
        <input type="text" name="fee" value="<?=isset($pro) && is_object($pro) ? $pro->fee : ''; ?>" required/>

        <label for="total">Total</label>
        <input type="text" name="total" value="<?=isset($pro) && is_object($pro) ? $pro->total : ''; ?>" required/>

        <hr>
        <input type="submit" class="registerbtn" value="Guardar" />

</div>
</form>



