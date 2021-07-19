


<br>
<br>
<br>
<br>

<div class="w3-container">
    <h1 class="w3-center" ">Ver posición del Chofer</h1>
    <p class="w3-center" >Conozca la geolocalización del chofer seleccionado.</p>
    <br>

    <div id="mapa" style="width:500px; height:400px; margin: auto;"></div>
    <br>
    <br>
    <div class="w3-container" style="text-align: center; padding-left: 40%; padding-right: 40%;">
        <label for="idLatitud " class="w3-label"  >Latitud</label>
        <input readonly class="w3-input w3-center" type="text" name="latitud" id="idLatitud" value="<?=isset($pro) && is_object($pro) ? $pro->latitud : ''; ?>" required>

        <label for="idLongitud" class="w3-label" >Longitud</label>
        <input readonly class="w3-input w3-center" type="text" name="longitud" id="idLongitud" value="<?=isset($pro) && is_object($pro) ? $pro->longitud : ''; ?>" required>
    </div>
</div>


<script>
    function loadMap() {


        var mapOptions = {
            center:new google.maps.LatLng(obtenerLatitud(),obtenerLongitud()),
            zoom:12,
            panControl: false,
            zoomControl: false,
            scaleControl: false,
            mapTypeControl:false,
            streetViewControl:true,
            overviewMapControl:true,
            rotateControl:true,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(obtenerLatitud(),obtenerLongitud()),
            map: map,
            draggable:true

        });

        google.maps.event.addListener(marker, "click", function (event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            alert( latitude + ', ' + longitude );
        });

    }

    function obtenerLatitud(){
        var latitud ="<?php echo $pro->latitud;?>";
        console.log(latitud);
        var latitudFloat= parseFloat(latitud);
        console.log(latitudFloat);
        return latitudFloat;
    }
    function obtenerLongitud(){
        var longitud ="<?php echo $pro->longitud;?>";
        console.log(longitud);
        var longitudFloat=parseFloat(longitud);
        console.log(longitudFloat);
        return  longitudFloat;
    }
    obtenerLatitud();
    obtenerLatitud();
</script>