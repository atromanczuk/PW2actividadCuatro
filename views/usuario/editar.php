
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <?php $url_action = base_url."usuario/save&id=".$pro->id; ?>

<?php endif; ?>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Editar Usuario</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>
    <hr>
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
            <label class="w3-label" for="nombre">Nombre</label>
            <input class="w3-input" type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"required/>

            <label class="w3-label" for="apellidos">Apellidos</label>
            <input class="w3-input" type="text" name="apellidos" value="<?=isset($pro) && is_object($pro) ? $pro->apellidos : ''; ?>" required/>

            <label class="w3-label" for="email">Email</label>
            <input class="w3-input" type="email" name="email" value="<?=isset($pro) && is_object($pro) ? $pro->email : ''; ?>" required/>

            <label class="w3-label" for="password">Contraseña</label>
            <input class="w3-input" type="text" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->pwd : ''; ?>" required/>

            <label class="w3-label" for="rol">Rol</label>
            <input class="w3-input" type="text" name="rol" value="<?=isset($pro) && is_object($pro) ? $pro->rol : ''; ?>" required/>
            <br>
            <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
        </div>
    </form>
</div>