
<?php if(isset($_SESSION['proforma']) && $_SESSION['proforma'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['proforma']) && $_SESSION['proforma'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('proforma'); ?>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center">Registrar Proforma</h1>
    <p class="w3-center">Por favor ingrese los datos solicitados a continuación</p>
    <hr>
    <form action="<?=base_url?>proforma/save" method="POST" enctype="multipart/form-data">
        <div class="w3-container" style="padding-left: 25%; padding-right: 25%;">
            <label class="w3-label" for="numero">Número</label>
            <input class="w3-input"  type="number" name="numero" value="<?=isset($pro) && is_object($pro) ? $pro->numero : ''; ?>" required/>

            <label class="w3-label" for="fecha">Fecha</label>
            <input class="w3-input"  type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->fecha : ''; ?>" required/>
            <br>
            <h2>CLIENTE</h2>
            <br>
            <label class="w3-label" for="denominacion">Denominación</label>
            <input class="w3-input"  type="text" name="denominacion" value="<?=isset($pro) && is_object($pro) ? $pro->denominacion : ''; ?>"required/>

            <label class="w3-label" for="cuit">CUIT</label>
            <input class="w3-input"  type="text" name="cuit" value="<?=isset($pro) && is_object($pro) ? $pro->cuit : ''; ?>" required/>

            <label class="w3-label" for="direccion">Dirección</label>
            <input class="w3-input"  type="text" name="direccion" value="<?=isset($pro) && is_object($pro) ? $pro->direccion : ''; ?>" required/>

            <label class="w3-label" for="telefono">Teléfono</label>
            <input class="w3-input"  type="text" name="telefono" value="<?=isset($pro) && is_object($pro) ? $pro->telefono : ''; ?>" required/>

            <label class="w3-label"for="email">Email</label>
            <input class="w3-input"  type="email" name="email" value="<?=isset($pro) && is_object($pro) ? $pro->email : ''; ?>" required/>

            <label class="w3-label" for="contactoUno">Contacto 1</label>
            <input class="w3-input"  type="text" name="contactoUno" value="<?=isset($pro) && is_object($pro) ? $pro->contactoUno : ''; ?>" />

            <label class="w3-label" for="contactoDos">Contacto 2</label>
            <input class="w3-input"  type="text" name="contactoDos" value="<?=isset($pro) && is_object($pro) ? $pro->contactoDos : ''; ?>" />
            <br>
            <h2>VIAJE</h2>
            <br>
            <label class="w3-label" for="idViaje">Id viaje</label>
            <input class="w3-input"  type="text" name="idViaje" value="<?=isset($pro) && is_object($pro) ? $pro->idViaje : ''; ?>"required/>
            <br>
            <label class="w3-label" for="origen">Origen</label>
            <input class="w3-input"  type="text" name="origen" value="<?=isset($pro) && is_object($pro) ? $pro->origen : ''; ?>"required/>

            <label class="w3-label" for="destino">Destino</label>
            <input class="w3-input"  type="text" name="destino" value="<?=isset($pro) && is_object($pro) ? $pro->destino : ''; ?>" required/>

            <label class="w3-label" for="fecha_carga">Fecha de Carga</label>
            <input class="w3-input"  type="date" name="fecha_carga" value="<?=isset($pro) && is_object($pro) ? $pro->fecha_carga : ''; ?>" required/>
            <br>
            <h2>CARGA</h2>
            <br>
            <label for="tipo">Tipo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" value="granel" checked/>
                <label class="form-check-label" for="granel">granel</label>

                <input class="form-check-input" type="radio" name="tipo" value="liquida" />
                <label class="form-check-label" for="liquida">liquida</label>

                <input class="form-check-input" type="radio" name="tipo"  value="veinte" />
                <label class="form-check-label" for="veinte">veinte</label>

                <input class="form-check-input" type="radio" name="tipo" id="cuarenta" value="cuarenta" />
                <label class="form-check-label" for="cuarenta">cuarenta</label>

                <input class="form-check-input" type="radio" name="tipo" id="jaula" value="jaula" />
                <label class="form-check-label" for="jaula">Jaula</label>

                <input class="form-check-input" type="radio" name="tipo" id="carCarrier" value="carCarrier" />
                <label class="form-check-label" for="carCarrier">carCarrier</label>
            </div>

            <label class="w3-label" for="peso_neto">Peso Neto</label>
            <input class="w3-input"  type="number" name="peso_neto" value="<?=isset($pro) && is_object($pro) ? $pro->peso_neto : ''; ?>" required/>

            <label class="w3-label" for="temperatura">Temperatura</label>
            <input class="w3-input"  type="text" name="temperatura" value="<?=isset($pro) && is_object($pro) ? $pro->temperatura : ''; ?>" required/>

            <label class="w3-label" for="IMOClass">IMOClass</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="IMOClass" value="classUno" <?php if (isset($pro) && is_object($pro) && ($pro->IMOClass=='classUno')): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="class1">Class 1:Explosives</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" value="classDos" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classDos')): ?><?php endif; ?>>
                <label class="form-check-label" for="class2">Class 2:Gases</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass"  value="classTres" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classTres')): ?><?php endif; ?>>
                <label class="form-check-label" for="class3">Class 3:Flamable Liquids</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class4.1" value="classCuatroUno" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classCuatroUno')): ?><?php endif; ?>>
                <label class="form-check-label" for="class4.1">Class 4.1:Flammable Solids or Substances</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class4.2" value="classCuatroDos" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classCuatroDos')): ?><?php endif; ?>>
                <label class="form-check-label" for="class4.2">Class 4.2:Flammable solids</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class4.3" value="classCuatroTres" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classCuatroTres')): ?><?php endif; ?>>
                <label class="form-check-label" for="class4.3">Class 4.3:Substances which, in contact with water, emit flammable gases</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class5.1" value="classCincoUno" <?php if (isset($pro) && is_object($pro) && ($pro->IMOClass=='classCincoUno')): ?><?php endif; ?>>
                <label class="form-check-label" for="class5.1">Class 5.1:Oxidizing substances (agents) by yielding oxygen increase the risk and intensity of fire</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class5.2" value="classCincoDos" <?php if (isset($pro) && is_object($pro) && ($pro->IMOClass=='classCincoDos')): ?><?php endif; ?>>
                <label class="form-check-label" for="class5.2">Class 5.2:Organic peroxides - most will burn rapidly and are sensitive to impact or friction</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class6.1" value="classSeisUno" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classSeisUno')): ?><?php endif; ?>>
                <label class="form-check-label" for="class6.1">Class 6.1:Toxic substances</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class6.2" value="classSeisDos" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classSeisDos')): ?><?php endif; ?>>
                <label class="form-check-label" for="class6.2">Class 6.2:Infectious substances</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class7" value="classSiete" <?php if (isset($pro) && is_object($pro) &&  ($pro->IMOClass=='classSiete')): ?><?php endif; ?>>
                <label class="form-check-label" for="class7">Class 7:Radioactive Substances</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class8" value="classOcho" <?php if (isset($pro) && is_object($pro) && ($pro->IMOClass=='classOcho')): ?><?php endif; ?>>
                <label class="form-check-label" for="class8">Class 8: Corrosives</label>
                <br>
                <input class="form-check-input" type="radio" name="IMOClass" id="class9" value="classNueve" <?php if (isset($pro) && is_object($pro) && ($pro->IMOClass=='classNueve')): ?><?php endif; ?>>
                <label class="form-check-label" for="class9">Class 9:Miscellaneous dangerous substances and articles </label>
            </div>
            <br>
            <label class="w3-label" for="IMOSclass">IMOSclass</label>
            <input class="w3-input"  type="text" name="IMOSclass" value="<?=isset($pro) && is_object($pro) ? $pro->IMOSclass : ''; ?>" required/>
            <br>
            <h2>COSTEO</h2>
            <br>

            <label class="w3-label" for="kilometros">Kilometros</label>
            <input class="w3-input"  type="number" name="kilometros" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros : ''; ?>" required/>

            <label class="w3-label" for="combustible">Combustible</label>
            <input class="w3-input"  type="number" name="combustible" value="<?=isset($pro) && is_object($pro) ? $pro->combustible : ''; ?>" required/>

            <label class="w3-label" for="ETD">ETD</label>
            <input class="w3-input"  type="text" name="ETD" value="<?=isset($pro) && is_object($pro) ? $pro->ETD : ''; ?>" required/>

            <label class="w3-label" for="ETA">ETA</label>
            <input class="w3-input"  type="text" name="ETA" value="<?=isset($pro) && is_object($pro) ? $pro->ETA : ''; ?>" required/>

            <label class="w3-label" for="viaticos">Viaticos</label>
            <input class="w3-input"  type="number" name="viaticos" value="<?=isset($pro) && is_object($pro) ? $pro->viaticos : ''; ?>" required/>
            <br>
            <label class="w3-label" for="peajesYPesajes">Peajes y Pesajes</label>
            <select class="w3-select" id="peajesYPesajes" name="peajesYPesajes"  required>
                <option value="0" selected>Cantidad de peajes</option>
                <option value="1">1 Peaje</option>
                <option value="2">2 Peajes</option>
                <option value="3">3 Peajes</option>
                <option value="4">4 Peajes</option>
                <option value="5">5 Peajes</option>
                <option value="6">6 Peajes</option>
                <option value="7">7 Peajes</option>
                <option value="8">8 Peajes</option>
                <option value="9">9 Peajes</option>
                <option value="10">10 Peajes</option>
            </select>
            <br>
            <label class="w3-label" for="extras">Extras</label>
            <input class="w3-input"  type="number" name="extras" value="<?=isset($pro) && is_object($pro) ? $pro->extras : ''; ?>" required/>

            <label class="w3-label" for="hazard">Hazard</label>
            <input class="w3-input"  type="text" name="hazard" value="<?=isset($pro) && is_object($pro) ? $pro->hazard : ''; ?>" required/>

            <label class="w3-label" for="reefer">Reefer</label>
            <input class="w3-input"  type="text" name="reefer" value="<?=isset($pro) && is_object($pro) ? $pro->reefer : ''; ?>" required/>

            <label class="w3-label" for="fee">Fee</label>
            <input class="w3-input"  type="number" name="fee" value="<?=isset($pro) && is_object($pro) ? $pro->fee : ''; ?>" required/>
            <input  type="hidden"  name="total" value="<?=isset($pro) && is_object($pro) ? $pro->total : ''; ?>" required>
            <br>

            <input type="submit"  class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;" />
        </div>
    </form>
</div>




