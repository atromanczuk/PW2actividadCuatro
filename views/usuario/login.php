<?php
session_start();
require_once '../../autoload.php';
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php if(!isset($_SESSION['identity'])): ?>

    <div class="imgcontainer">
        <img src="/trabajoFinal/uploads/images/user.png" alt="Avatar" class="avatar">
    </div>
    <form action="<?=base_url?>usuario/login" method="post">
        <div class="container">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Ingresá tu email" required/>

            <label for="password">Contraseña</label>
            <input type="password" name="password"  placeholder="Ingresá tu contraseña" required/>

            <input type="submit" value="Enviar" />

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancelar</button>
            <span class="psw"><a href="#" class="azul">¿Olvidaste tu contraseña?</a></span>
        </div>
    </form>
<?php endif; ?>




<?php
require_once '../layout/footer.php';
?>