
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Costeo <?=$pro->kilometros?></h1>
    <?php $url_action = base_url."costeo/save&id=".$pro->id; ?>

<?php endif; ?>

<div class="form_container">
<br>
<br>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<div class="container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="kilometros">Kilometros</label>
        <input type="text" name="kilometros" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros : ''; ?>"required/>
        <br>
        <label for="combustible">Combustible</label>
        <input type="text" name="combustible" value="<?=isset($pro) && is_object($pro) ? $pro->combustible : ''; ?>" required/>
        <br>
        <label for="ETD">ETD</label>
        <input type="text" name="ETD" value="<?=isset($pro) && is_object($pro) ? $pro->ETD : ''; ?>" required/>
        <br>
        <label for="ETA">ETA</label>
        <input type="text" name="ETA" value="<?=isset($pro) && is_object($pro) ? $pro->ETA : ''; ?>" required/>
        <br>
        <label for="viaticos">Viaticos</label>
        <input type="text" name="viaticos" value="<?=isset($pro) && is_object($pro) ? $pro->viaticos : ''; ?>" required/>
        <br>
        <label for="peajesYPesajes">Peajes y Pesajes</label>
        <input type="text" name="peajesYPesajes" value="<?=isset($pro) && is_object($pro) ? $pro->peajesYPesajes : ''; ?>" required/>
        <br>
        <label for="extras">Extras</label>
        <input type="text" name="extras" value="<?=isset($pro) && is_object($pro) ? $pro->extras : ''; ?>" required/>
        <br>
        <label for="hazard">Hazard</label>
        <input type="text" name="hazard" value="<?=isset($pro) && is_object($pro) ? $pro->hazard : ''; ?>" required/>
        <br>
        <label for="reefer">Reefer</label>
        <input type="text" name="reefer" value="<?=isset($pro) && is_object($pro) ? $pro->reefer : ''; ?>" required/>
        <br>
        <label for="fee">Fee</label>
        <input type="text" name="fee" value="<?=isset($pro) && is_object($pro) ? $pro->fee : ''; ?>" required/>
        <br>
        <label for="total">Total</label>
        <input type="text" name="total" value="<?=isset($pro) && is_object($pro) ? $pro->total : ''; ?>" required/>
        <br>
        <input type="submit" class="registerbtn" value="Guardar" />

    </form>
</div>

</div>