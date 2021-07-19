
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <?php $url_action = base_url."chofer/save&id=".$pro->id; ?>

<?php endif; ?>

<br>
<br>
<br>

<div class="w3-container">
    <div id="map" style="width:500px; height:400px; display: block; margin: auto;" ></div>
    <h1 class="w3-center">Editar Chofer</h1>
    <p class="w3-center">Por favor edite los datos a continuación</p>

        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">
                <label for="latitud" class="w3-label">Latitud</label>
                <input type="text" class="w3-input" name="latitud" id="idLatitud" value="<?=isset($pro) && is_object($pro) ? $pro->latitud : ''; ?>" required>
                <br>
                <label for="longitud" class="w3-label">Longitud</label>
                <input type="text" class="w3-input" name="longitud" id="idLongitud" value="<?=isset($pro) && is_object($pro) ? $pro->longitud : ''; ?>" required>
                 <br>
                <label for="kilometros" class="w3-label">Kilómetros</label>
                <input  class="w3-input" type="number" name="kilometros" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros : ''; ?>" required>
                <br>
                <label for="combustible" class="w3-label">Combustible</label>
                <input  class="w3-input" type="number" name="combustible" value="<?=isset($pro) && is_object($pro) ? $pro->combustible : ''; ?>" required>
                <br>
                <label for="viaticos" class="w3-label">Viáticos</label>
                <input  class="w3-input" type="number"  name="viaticos" value="<?=isset($pro) && is_object($pro) ? $pro->viaticos : ''; ?>" required >
                <br>
                <label for="peajesYPesajes" class="w3-label" >Peajes y Pesajes</label>
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
                <label for="extras" class="w3-label">Extras</label>
                <input  class="w3-input" type="number" name="extras" value="<?=isset($pro) && is_object($pro) ? $pro->extras : ''; ?>" required>
                <br>
                <label for="fee" class="w3-label">Fee</label>
                <input  class="w3-input" type="number" name="fee" value="<?=isset($pro) && is_object($pro) ? $pro->fee : ''; ?>" required>
                <input type="hidden"  name="dni" value="<?=isset($pro) && is_object($pro) ? $pro->dni : ''; ?>"  >
                <br>
                <input type="hidden"  name="total" value="<?=isset($pro) && is_object($pro) ? $pro->total : ''; ?>" required>
                 <br>
                <input type="submit"  class="w3-button w3-blue" value="Guardar" style="margin-left: 40%; margin-right: 40%;" />

            </div>
        </form>
</div>

<script>


    var marker;          //variable del marcador
    var coords = {};    //coordenadas obtenidas con la geolocalización

    //Funcion principal
    initMap = function ()
    {

        //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
            function (position){
                coords =  {
                    lng: <?php echo $pro->longitud;?>,
                    lat: <?php echo $pro->latitud;?>
                };
                setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa


            },function(error){console.log(error);});

    }



    function setMapa (coords)
    {
        //Se crea una nueva instancia del objeto mapa
        var map = new google.maps.Map(document.getElementById('map'),
            {
                zoom: 13,
                center:new google.maps.LatLng(coords.lat,coords.lng),

            });

        //Creamos el marcador en el mapa con sus propiedades
        //para nuestro obetivo tenemos que poner el atributo draggable en true
        //position pondremos las mismas coordenas que obtuvimos en la geolocalización
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng(coords.lat,coords.lng),

        });
        //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
        //cuando el usuario a soltado el marcador
        marker.addListener('click', toggleBounce);

        marker.addListener( 'dragend', function (event)
        {
            //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
            document.getElementById("idLatitud").value = this.getPosition().lat();
            document.getElementById("idLongitud").value= this.getPosition().lng();
        });
    }

    //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }

    // Carga de la libreria de google maps

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>

