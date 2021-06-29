<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(isset($_SESSION['carga']) && $_SESSION['carga'] == 'complete'): ?>
    <strong class="alert_green">Carga completada correctamente</strong>
<?php elseif(isset($_SESSION['carga']) && $_SESSION['carga'] == 'failed'): ?>
    <strong class="alert_red">Carga fallida, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('carga'); ?>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="signin">
        <h1>Carga</h1>
        <p>Por favor complete los datos a continuación</p>
        <hr>
    </div>

    <form action="<?=base_url?>carga/save" method="POST" enctype="multipart/form-data">
        <label for="tipo">Tipo</label>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" value="granel" checked/>
            <label class="form-check-label" for="granel">
                granel
            </label>

            <input class="form-check-input" type="radio" name="tipo" value="liquida" />
            <label class="form-check-label" for="liquida">
                liquida
            </label>

            <input class="form-check-input" type="radio" name="tipo"  value="veinte" />
            <label class="form-check-label" for="veinte">
                veinte
            </label>

            <input class="form-check-input" type="radio" name="tipo" id="cuarenta" value="cuarenta" />
            <label class="form-check-label" for="cuarenta">
                cuarenta
            </label>

            <input class="form-check-input" type="radio" name="tipo" id="jaula" value="jaula" />
            <label class="form-check-label" for="jaula">
                Jaula
            </label>

            <input class="form-check-input" type="radio" name="tipo" id="carCarrier" value="carCarrier" />
            <label class="form-check-label" for="carCarrier">
                carCarrier
            </label>
        </div>

        <label for="peso_neto">Peso Neto</label>
        <input type="text" name="peso_neto" value="<?=isset($pro) && is_object($pro) ? $pro->peso_neto : ''; ?>" required/>
        <label for="hazard">Hazard</label>

<div>

    <input class="form-check-input" type="radio" name="hazard" id="si" value="Si" checked/>
    <label class="form-check-label" for="Si">
        Si
    </label>


    <input class="form-check-input" type="radio" name="hazard" id="no" value="No" />
    <label class="form-check-label" for="No">
        No
    </label>
</div>



        <label for="reefer">Reefer</label>
        <input type="text" name="reefer" value="<?=isset($pro) && is_object($pro) ? $pro->reefer : ''; ?>" required/>

        <label for="temperatura">Temperatura</label>
        <input type="text" name="temperatura" value="<?=isset($pro) && is_object($pro) ? $pro->temperatura : ''; ?>" required/>

        <label for="IMOClass">IMOClass</label>
        <input type="text" name="IMOClass" value="<?=isset($pro) && is_object($pro) ? $pro->IMOClass : ''; ?>" required/>

        <label for="IMOSclass">IMOSclass</label>
        <input type="text" name="IMOSclass" value="<?=isset($pro) && is_object($pro) ? $pro->IMOSclass : ''; ?>" required/>

        <hr>
        <input type="submit" class="registerbtn" value="Guardar" />

</div>
</form>



