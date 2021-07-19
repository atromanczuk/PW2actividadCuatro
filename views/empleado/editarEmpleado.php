
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <?php $url_action = base_url."empleado/save&id=".$pro->id; ?>

<?php endif; ?>

<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Editar Empleado</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>
    <hr>
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">

            <label class="w3-label" for="dni">DNI</label>
           <input class="w3-input" type="text" id="dni" name="dni" value="<?=isset($pro) && is_object($pro) ? $pro->dni : ''; ?>" >

            <label class="w3-label" for="nombre">Nombre</label>
           <input class="w3-input" type="text" id="nombre" name="nombre"  value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" >

            <label class="w3-label" for="apellido">Apellido</label>
            <input class="w3-input" type="text" name="apellido" value="<?=isset($pro) && is_object($pro) ? $pro->apellido : ''; ?>" >

            <label class="w3-label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input class="w3-input" type="date" name="fecha_nacimiento" value="<?=isset($pro) && is_object($pro) ? $pro->fecha_nacimiento : ''; ?>" >

            <label class="w3-label" for="tipo_licencia">Tipo de licencia</label>
            <input class="w3-input" type="text"  name="tipo_licencia" value="<?=isset($pro) && is_object($pro) ? $pro->tipo_licencia : ''; ?>"  >

                <label class="w3-label" for="tipo_empleado">Tipo de empleado</label>
                <input class="w3-input" type="text"  name="tipo_empleado" value="<?=isset($pro) && is_object($pro) ? $pro->tipo_empleado : ''; ?>"  >


            <br>
                <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
            </div>
        </form>
</div>

