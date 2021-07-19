
<br>
<br>
<br>
<br>
<br>
<?php if(!isset($_SESSION['identity'])): ?>

    <div class="imgcontainer">
        <img src="/trabajoFinal/uploads/images/user.png" alt="Avatar" class="w3-center" height="150px" width="150px" style="display: block; margin: auto;">
    </div>
    <form action="<?=base_url?>usuario/login" method="post">
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
            <label class="w3-label" for="email">Email</label>
            <input class="w3-input" type="email" name="email" placeholder="Ingresá tu email" required/>

            <label class="w3-label" for="password">Contraseña</label>
            <input class="w3-input" type="password" name="password"  placeholder="Ingresá tu contraseña" required/>
            <a href="#" class="azul">¿Olvidaste tu contraseña?</a>
            <br>
            <br>
            <input type="submit" class="w3-btn w3-blue" value="Enviar" />

        </div>
    </form>
    <br>
<?php endif; ?>



