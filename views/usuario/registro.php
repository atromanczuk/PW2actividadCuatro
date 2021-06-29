<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<div class="container">
    <div class="signin">
        <h1 >Registro</h1>
        <p>Por favor complete los datos a continuación</p>
        <hr>
    </div>

    <form action="<?=base_url?>usuario/save" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"required/>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?=isset($pro) && is_object($pro) ? $pro->apellidos : ''; ?>" required/>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?=isset($pro) && is_object($pro) ? $pro->email : ''; ?>" required/>

        <label for="password">Contraseña</label>
        <input type="password" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->password : ''; ?>" required/>


        <hr>
        <p class="signin">Haciendo click aquí aceptás los <a class="azul" href="#"> Términos y Condiciones</a>.</p>
        <input type="submit" class="registerbtn" value="Guardar" />

</div>
</form>

<div class="container signin">
    <p>¿Aún no te registraste? <a href="#">Registrate</a>.</p>
</div>

