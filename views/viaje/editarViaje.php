
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Viaje <?=$pro->origen?></h1>
    <?php $url_action = base_url."viaje/save&id=".$pro->id; ?>

<?php endif; ?>
<br>
<br>
<br>
<br>
<br>

<div class="form_container">
    <div class="w3-container">
        <div class="container">

            <div class="signin">
                <h1>Editar</h1>
                <p>Por favor edite los datos a continuación</p>
                <hr>
            </div>


            <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
                <label for="origen">Origen</label>
                <input type="text" name="origen" value="<?=isset($pro) && is_object($pro) ? $pro->origen : ''; ?>"required/>
                <br>

                <label for="destino">Destino</label>
                <input type="text" name="destino" id="destino" value="<?=isset($pro) && is_object($pro) ? $pro->destino : ''; ?>" required/>
                <br>

                <label for="fecha_carga">Fecha de Carga</label>
                <input type="text" name="fecha_carga" value="<?=isset($pro) && is_object($pro) ? $pro->fecha_carga : ''; ?>" required/>
                <br>

                <label for="ETA">ETA</label>
                <input type="text" name="ETA" value="<?=isset($pro) && is_object($pro) ? $pro->ETA : ''; ?>" required/>
                <br>

                <input type="submit" class="registerbtn" value="Guardar" />
        </div>
            </form>


    </div>



</div>