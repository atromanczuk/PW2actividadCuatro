
<?php if(isset($_SESSION['chofer']) && $_SESSION['chofer'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['chofer']) && $_SESSION['chofer'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('chofer'); ?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="w3-container">
    <div id="map" style="width:500px; height:400px; display: block; margin: auto;" ></div>
    <h1 class="w3-center">Registrar Chofer</h1>
    <p class="w3-center">Por favor ingrese los datos solicitados a continuación</p>

    <form action="<?=base_url?>chofer/save" method="POST" enctype="multipart/form-data">
        <br>
        <div class="w3-container" style="padding-left: 30%; padding-right: 30%;">

            <label class="w3-label" for="latitud">Latitud</label>
            <input class="w3-input" type="text" name="latitud" id="idLatitud" value="<?=isset($pro) && is_object($pro) ? $pro->latitud : ''; ?>" required>
            <br>
            <label class="w3-label" for="longitud">Longitud</label>
            <input class="w3-input" type="text" name="longitud" id="idLongitud" value="<?=isset($pro) && is_object($pro) ? $pro->longitud : ''; ?>" required>
            <br>
            <label class="w3-label" for="kilometros">Kilómetros</label>
            <input class="w3-input" type="number"  name="kilometros" value="<?=isset($pro) && is_object($pro) ? $pro->kilometros : ''; ?>" required>
            <br>
            <label class="w3-label" for="combustible">Combustible</label>
            <input class="w3-input" type="number" name="combustible" value="<?=isset($pro) && is_object($pro) ? $pro->combustible : ''; ?>" required>
            <br>
            <label class="w3-label" for="viaticos">Viáticos</label>
            <input class="w3-input" type="number"  name="viaticos" value="<?=isset($pro) && is_object($pro) ? $pro->viaticos : ''; ?>" required >
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
            <input class="w3-input" type="number" name="extras" value="<?=isset($pro) && is_object($pro) ? $pro->extras : ''; ?>" required>
            <br>
            <label class="w3-label" for="fee">Fee</label>
            <input class="w3-input" type="number" name="fee" value="<?=isset($pro) && is_object($pro) ? $pro->fee : ''; ?>" required>
            <br>
            <label class="w3-label" for="dni">Dni</label>
            <input class="w3-input" type="number"  name="dni" value="<?=isset($pro) && is_object($pro) ? $pro->dni : ''; ?>"  >
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
                        lng: position.coords.longitude,
                        lat: position.coords.latitude
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






