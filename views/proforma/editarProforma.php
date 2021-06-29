
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Proforma <?=$pro->numero?></h1>
    <?php $url_action = base_url."proforma/save&id=".$pro->id; ?>

<?php endif; ?>
<br>
<br>

<h1> Editar</h1>

<div class="form_container">

<div class="container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <br>
        <br>
        <label for="numero">Número</label>
        <input type="number" name="numero" value="<?=isset($pro) && is_object($pro) ? $pro->numero : ''; ?>" required/>
        <br>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->fecha : ''; ?>" required/>
        <br>
        <input type="submit" class="registerbtn" value="Guardar" />
    </form>
</div>

</div>