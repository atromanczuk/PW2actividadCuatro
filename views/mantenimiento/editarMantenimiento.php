
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Mantenimiento</h1>
    <?php $url_action = base_url."mantenimiento/save&id=".$pro->id; ?>
<?php endif; ?>

<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Editar Mantenimiento</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>
    <hr>
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
                <label class="w3-label" for="fecha_service">Fecha de Service</label>
               <input class="w3-input" type="date" id="fecha_service" name="fecha_service"  value="<?=isset($pro) && is_object($pro) ? $pro->fecha_service : ''; ?>" required>
                <br>
                <label class="w3-label" for="km_unidad">Kilometros de la unidad</label>
                <input class="w3-input" type="text" name="km_unidad" value="<?=isset($pro) && is_object($pro) ? $pro->km_unidad: ''; ?>" required>
                <br>
                <label class="w3-label" for="costo">Costo</label>
                <input class="w3-input" type="number" name="costo" value="<?=isset($pro) && is_object($pro) ? $pro->costo : ''; ?>" required>
                <br>
                <label class="w3-label" for="service_interno">Service Interno</label>
                <input class="w3-input" type="text"  name="service_interno" value="<?=isset($pro) && is_object($pro) ? $pro->service_interno : ''; ?>" required >
                <br>
                <label class="w3-label" for="service_externo">Service Externo</label>
                <input class="w3-input" type="text" name="service_externo" value="<?=isset($pro) && is_object($pro) ? $pro->service_externo : ''; ?>" required>
                <br>
                <label class="w3-label" for="mecanico">Mecanico</label>
                <input class="w3-input" type="text" name="mecanico" value="<?=isset($pro) && is_object($pro) ? $pro->mecanico : ''; ?>" required>
                <br>
                <label class="w3-label" for="repuestos_cambiados">Repuestos Cambiados</label>
                <input class="w3-input" type="text"  name="repuestos_cambiados" value="<?=isset($pro) && is_object($pro) ? $pro->repuestos_cambiados : ''; ?>" required>
                <br>

                <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
            </div>
       </form>
</div>

