<br>
<br>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>


<div class="w3-container">
    <h1 class="w3-center">Registrar Usuario</h1>
    <p class="w3-center">Por favor ingrese los datos a continuación</p>
    <hr>
    <form action="<?=base_url?>usuario/save" method="POST" enctype="multipart/form-data">
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
            <label class="w3-label" for="nombre">Nombre</label>
            <input class="w3-input" type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"required/>

            <label class="w3-label" for="apellidos">Apellidos</label>
            <input class="w3-input" type="text" name="apellidos" value="<?=isset($pro) && is_object($pro) ? $pro->apellidos : ''; ?>" required/>

            <label class="w3-label" for="email">Email</label>
            <input class="w3-input" type="email" name="email" value="<?=isset($pro) && is_object($pro) ? $pro->email : ''; ?>" required/>

            <label class="w3-label" for="password">Contraseña</label>
            <input class="w3-input" type="password" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->password : ''; ?>" required/>


            <hr>
            <p class="signin">Acepto los <a class="azul" href="#"> Términos y Condiciones</a>.</p>
            <br>
            <input type="hidden" name="enviar" value="enviar">
            <input type="submit" class="w3-button w3-blue" value="Guardar" />
        </div>
    </form>

</div>

