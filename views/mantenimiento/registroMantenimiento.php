
<?php if(isset($_SESSION['mantenimiento']) && $_SESSION['mantenimiento'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['mantenimiento']) && $_SESSION['mantenimiento'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('mantenimiento'); ?>

<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Registrar Mantenimiento</h1>
    <p class="w3-center">Por favor ingrese los datos solicitados a continuación</p>

    <form action="<?=base_url?>mantenimiento/save" method="POST" enctype="multipart/form-data">
        <br>
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">

            <label class="w3-label" for="fecha_service">Fecha de Service</label>
            <input class="w3-input" type="date" id="fecha_service" name="fecha_service"  value="<?=isset($pro) && is_object($pro) ? $pro->fecha_service : ''; ?>" required>
            <br>
            <input class="w3-input" type="hidden" name="km_unidad" value="<?=isset($pro) && is_object($pro) ? $pro->km_unidad: ''; ?>" required>
            <br>
            <label class="w3-label" for="costo">Costo</label>
            <input class="w3-input" type="number" name="costo" value="<?=isset($pro) && is_object($pro) ? $pro->costo : ''; ?>" required>
            <br>
            <label class="w3-label" for="service_interno">Service Interno</label>
            <input class="w3-input" type="number"  name="service_interno" value="<?=isset($pro) && is_object($pro) ? $pro->service_interno : ''; ?>" required >
            <br>
            <label class="w3-label" for="service_externo">Service Externo</label>
            <input class="w3-input" type="number" name="service_externo" value="<?=isset($pro) && is_object($pro) ? $pro->service_externo : ''; ?>" required>
            <br>
            <label class="w3-label" for="mecanico">Mecánico</label>
            <input class="w3-input" type="number" name="mecanico" value="<?=isset($pro) && is_object($pro) ? $pro->mecanico : ''; ?>" required>
            <br>
            <label class="w3-label" for="repuestos_cambiados">Repuestos Cambiados</label>
            <input class="w3-input" type="number"  name="repuestos_cambiados" value="<?=isset($pro) && is_object($pro) ? $pro->repuestos_cambiados : ''; ?>" required>
            <br>
             <label class="w3-label" for="idVehiculo">Vehículo</label>
             <input class="w3-input" type="number" name="idVehiculo" value="<?=isset($pro) && is_object($pro) ? $pro->idVehiculo : ''; ?>" required>
            <br>
            <input type="submit"  class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;" />
        </div>
    </form>
</div>



