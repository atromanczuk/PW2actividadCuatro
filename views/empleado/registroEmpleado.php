
<?php if(isset($_SESSION['empleado']) && $_SESSION['empleado'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['empleado']) && $_SESSION['empleado'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('empleado'); ?>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Registrar Empleado</h1>
    <p class="w3-center">Por favor ingrese los datos solicitados a continuación</p>
    <hr>
    <form action="<?=base_url?>empleado/save" method="POST" enctype="multipart/form-data">
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">

            <label class="w3-label" for="dni">DNI</label>
            <input class="w3-input" type="text" id="dni" name="dni" value="<?=isset($pro) && is_object($pro) ? $pro->dni : ''; ?>" required>

            <label class="w3-label" for="nombre">Nombre</label>
            <input class="w3-input" type="text" id="nombre" name="nombre"  value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" required>

            <label class="w3-label" for="apellido">Apellido</label>
            <input class="w3-input" type="text" name="apellido" value="<?=isset($pro) && is_object($pro) ? $pro->apellido : ''; ?>" required>

            <label class="w3-label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input class="w3-input" type="date" name="fecha_nacimiento" value="<?=isset($pro) && is_object($pro) ? $pro->fecha_nacimiento : ''; ?>" required>

            <label class="w3-label" for="tipo_licencia">Tipo de licencia</label>
            <input class="w3-input" type="text"  name="tipo_licencia" value="<?=isset($pro) && is_object($pro) ? $pro->tipo_licencia : ''; ?>" required >

            <label class="w3-label" for="tipo_empleado">Tipo de empleado</label>
            <input class="w3-input" type="text"  name="tipo_empleado" value="<?=isset($pro) && is_object($pro) ? $pro->tipo_empleado : ''; ?>" required >
            <br>
            <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
        </div>
    </form>
</div>



