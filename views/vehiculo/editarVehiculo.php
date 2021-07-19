
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <?php $url_action = base_url."vehiculo/save&id=".$pro->id; ?>

<?php endif; ?>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Editar Vehículo</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>
    <hr>
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
            <label class="w3-label" for="marca">Marca</label>
            <input class="w3-input" type="text" name="marca"  value="<?=isset($pro) && is_object($pro) ? $pro->marca : ''; ?>" required>

            <label class="w3-label" for="modelo">Modelo</label>
            <input class="w3-input" type="text" name="modelo"  value="<?=isset($pro) && is_object($pro) ? $pro->modelo : ''; ?>" required>

            <label class="w3-label" for="patente">Patente</label>
            <input class="w3-input" type="text"  name="patente" value="<?=isset($pro) && is_object($pro) ? $pro->patente : ''; ?>" required>

            <label class="w3-label" for="nro_chasis">Nro Chasis</label>
            <input class="w3-input" type="text" name="nro_chasis" value="<?=isset($pro) && is_object($pro) ? $pro->nro_chasis : ''; ?>" required>

            <label class="w3-label" for="nro_motor">Nro Motor</label>
            <input class="w3-input" type="text"  name="nro_motor" value="<?=isset($pro) && is_object($pro) ? $pro->nro_motor : ''; ?>" required >


            <label class="w3-label" for="anio_fabricacion">Año Fabricacion</label>
            <input class="w3-input" type="date" name="anio_fabricacion" value="<?=isset($pro) && is_object($pro) ? $pro->anio_fabricacion : ''; ?>" required>

            <label class="w3-label" for="calendarizacion_service">Calendario Service</label>
            <input class="w3-input" type="date" name="calendarizacion_service" value="<?=isset($pro) && is_object($pro) ? $pro->calendarizacion_service : ''; ?>" required>
            <label class="w3-label" for="kilometraje">Kilometraje</label>
            <input class="w3-input" type="number"  name="kilometraje" value="<?=isset($pro) && is_object($pro) ? $pro->kilometraje : ''; ?>"  required>
            <br>
            <input class="w3-input" type="hidden"  name="kilometros_totales" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros_totales : ''; ?>"  required>
           <br>
            <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
        </div>
    </form>
</div>



