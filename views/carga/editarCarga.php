
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Carga <?=$pro->tipo?></h1>
    <?php $url_action = base_url."carga/save&id=".$pro->id; ?>

<?php endif; ?>

<div class="form_container">
<br>
<br>
<br>
    <br>
    <br>
    <div class="container">
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <label for="tipo">Tipo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" value="granel" <?php if (isset($pro) && is_object($pro) && ($pro->tipo=='granel')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="granel">
                    granel
                </label>

                <input class="form-check-input" type="radio" name="tipo" value="liquida" <?php if (isset($pro) && is_object($pro) &&  ($pro->tipo=='liquida')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="liquida">
                    liquida
                </label>

                <input class="form-check-input" type="radio" name="tipo"  value="veinte" <?php if (isset($pro) && is_object($pro) &&  ($pro->tipo=='veinte')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="veinte">
                    veinte
                </label>

                <input class="form-check-input" type="radio" name="tipo" id="cuarenta" value="cuarenta" <?php if (isset($pro) && is_object($pro) &&  ($pro->tipo=='cuarenta')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="cuarenta">
                    cuarenta
                </label>

                <input class="form-check-input" type="radio" name="tipo" id="jaula" value="jaula" <?php if (isset($pro) && is_object($pro) && ($pro->tipo=='jaula')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="jaula">
                    Jaula
                </label>

                <input class="form-check-input" type="radio" name="tipo" id="carCarrier" value="carCarrier" <?php if (isset($pro) && is_object($pro) &&  ($pro->tipo=='carCarrier')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="carCarrier">
                    carCarrier
                </label>
            </div>

            <label for="peso_neto">Peso Neto</label>
            <input type="text" name="peso_neto" value="<?=isset($pro) && is_object($pro) ? $pro->peso_neto : ''; ?>" required>

            <br>
            <label for="hazard">Hazard</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hazard" id="si" value="Si" <?php if (isset($pro) && is_object($pro) &&  ($pro->hazard=='Si')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="Si">
                    Si
                </label>

                <input class="form-check-input" type="radio" name="hazard" id="no" value="No" <?php if (isset($pro) && is_object($pro) &&  ($pro->hazard=='No')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="No">
                    No
                </label>
            </div>
            <br>
            <label for="reefer">Reefer</label>
            <input type="text" name="reefer" value="<?=isset($pro) && is_object($pro) ? $pro->reefer : ''; ?>" required>
            <br>
            <label for="temperatura">Temperatura</label>
            <input type="text" name="temperatura" value="<?=isset($pro) && is_object($pro) ? $pro->temperatura : ''; ?>" required>
            <br>
            <label for="IMOClass">IMOClass</label>
            <input type="text" name="IMOClass" value="<?=isset($pro) && is_object($pro) ? $pro->IMOClass : ''; ?>" required>
            <br>
            <label for="IMOSclass">IMOSclass</label>
            <input type="text" name="IMOSclass" value="<?=isset($pro) && is_object($pro) ? $pro->IMOSclass : ''; ?>" required>
            <br>
            <input type="submit" class="registerbtn" value="Guardar" >

        </form>
    </div>


</div>
