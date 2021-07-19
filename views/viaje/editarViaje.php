<br>
<br>
<br>
<br>
<br>
<br>
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <?php $url_action = base_url."viaje/save&id=".$pro->id; ?>

<?php endif; ?>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Editar Viaje</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>
    <hr>
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
                <label class="w3-label" for="vehiculo">Vehículo</label>
                <input class="w3-input" type="number"  name="vehiculo" value="<?=isset($pro) && is_object($pro) ? $pro->vehiculo : ''; ?>" required>

                <label class="w3-label" for="origen">Origen</label>
                <input class="w3-input" type="text" name="origen"  value="<?=isset($pro) && is_object($pro) ? $pro->origen : ''; ?>" required>

                <label class="w3-label" for="destino">Destino</label>
                <input class="w3-input" type="text" name="destino"  value="<?=isset($pro) && is_object($pro) ? $pro->destino : ''; ?>" required>

                <label class="w3-label" for="chofer">Chofer</label>
                <input class="w3-input" type="number"  name="chofer" value="<?=isset($pro) && is_object($pro) ? $pro->chofer : ''; ?>" required>

                <label class="w3-label" for="cliente">Cliente</label>
                <input class="w3-input" type="number" name="cliente" value="<?=isset($pro) && is_object($pro) ? $pro->cliente : ''; ?>" required>
                <br>

                <label class="w3-label" for="tipo_carga">Tipo Carga</label>

                <br>
                <input class="form-check-input" type="radio" name="tipo_carga" value="granel" checked/>
                <label for="granel">granel</label>
                <br>
                    <input class="form-check-input" type="radio" name="tipo_carga" value="liquida" />
                    <label class="form-check-label" for="liquida">liquida</label>
                    <br>
                    <input class="form-check-input" type="radio" name="tipo_carga"  value="veinte" />
                    <label class="form-check-label" for="veinte">veinte</label>
                    <br>
                    <input class="form-check-input" type="radio" name="tipo_carga" id="cuarenta" value="cuarenta" />
                    <label class="form-check-label" for="cuarenta">cuarenta</label>
                    <br>
                    <input class="form-check-input" type="radio" name="tipo_carga" id="jaula" value="jaula" />
                    <label class="form-check-label" for="jaula">Jaula</label>
                    <br>
                    <input class="form-check-input" type="radio" name="tipo_carga" id="carCarrier" value="carCarrier" />
                    <label class="form-check-label" for="carCarrier">carCarrier</label>
                <br>
                <br>
                <label class="w3-label" for="fecha">Fecha</label>
                <input class="w3-input" type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->fecha : ''; ?>" required/>
                <br>
                <label class="w3-label" for="tiempo_estimado_viaje">Tiempo estimado de viaje</label>
                <input class="w3-input" type="number"  name="tiempo_estimado_viaje" value="<?=isset($pro) && is_object($pro) ? $pro->tiempo_estimado_viaje : ''; ?>" required >
                <br>
                <label class="w3-label" for="tiempo_real">Tiempo Real</label>
                <input class="w3-input" type="number"  name="tiempo_real" value="<?=isset($pro) && is_object($pro) ? $pro->tiempo_real : ''; ?>" required >
                <br>
                <label class="w3-label" for="desviacion">Desviación</label>
                <input class="w3-input" type="number"  name="desviacion" value="<?=isset($pro) && is_object($pro) ? $pro->desviacion : ''; ?>" required >
                <br>
                <label class="w3-label" for="kilometros_recorridos_previstos">Kilometros recorridos previsto</label>
                <input class="w3-input" type="number" name="kilometros_recorridos_previstos" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros_recorridos_previstos : ''; ?>" required>
                <br>
                <label class="w3-label" for="kilometros_recorridos_reales">Kilometros recorridos reales</label>
                <input class="w3-input" type="number" name="kilometros_recorridos_reales" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros_recorridos_reales : ''; ?>" required>
                <br>
                <label class="w3-label" for="combustible_consumido_previsto">Combustible consumido previsto</label>
                <input class="w3-input" type="number" name="combustible_consumido_previsto" value="<?=isset($pro) && is_object($pro) ? $pro->combustible_consumido_previsto : ''; ?>" required>
                <br>
                <label class="w3-label" for="combustible_consumido_real">Combustible consumido real</label>
                <input class="w3-input" type="number" name="combustible_consumido_real" value="<?=isset($pro) && is_object($pro) ? $pro->combustible_consumido_real : ''; ?>" required>
                <br>

                <input type="submit" class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;"/>
            </div>
        </form>
</div>

