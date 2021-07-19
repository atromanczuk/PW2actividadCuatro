<!DOCTYPE html>
<html lang="es">
<head>
    <title>No Tan Barats</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../uploads/css/styles.css">
    <script src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>

</head>

<body onload="loadMap()">


<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="<?=base_url?>usuario/index" class="w3-bar-item w3-button w3-wide">TRANSPORTECH</a>

        <div class="w3-right w3-hide-small">
            <?php if(isset($_SESSION['identity'])): ?>
            <a href="<?=base_url?>usuario/index" class="w3-bar-item w3-button">NOSOTROS</a>
            <a href="<?=base_url?>usuario/index" class="w3-bar-item w3-button"><i class="fa fa-user"></i> EQUIPO</a>
            <a href="<?=base_url?>usuario/index" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
            <a href="<?=base_url?>usuario/index" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACTO</a>
            <?php endif; ?>
            <?php if(!isset($_SESSION['identity'])): ?>
            <a href="<?=base_url?>usuario/login" class="w3-bar-item w3-button"><i class="fa fa-lock"></i> LOGIN </a>
            <a href="<?=base_url?>usuario/registro" class="w3-bar-item w3-button"><i class="fa fa-user-plus"></i> REGISTRO </a>
            <?php else: ?>
                <a href="<?=base_url?>usuario/logout" class="w3-bar-item w3-button">Cerrar sesión</a>
            <?php endif; ?>

        </div>

        <br>
        <div class="w3-middle">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <div class="w3-right w3-hide-small">
                <?php if(isset($_SESSION['identity'])&&isset($_SESSION['admin'])): ?>
                <a href="<?=base_url?>usuario/getAll" class="w3-bar-item w3-button">Ver usuarios</a>
                <a href="<?=base_url?>empleado/getAll" class="w3-bar-item w3-button">Ver Empleados</a>
                <a href="<?=base_url?>proforma/getAll"  class="w3-bar-item w3-button">Ver Proformas</a>
                <a href="<?=base_url?>chofer/getAll"  class="w3-bar-item w3-button">Ver planilla Chofer</a>
                <a href="<?=base_url?>viaje/getAll"  class="w3-bar-item w3-button">Ver viajes</a>
                <a href="<?=base_url?>vehiculo/getAll"  class="w3-bar-item w3-button">Ver vehiculos</a>
                <a href="<?=base_url?>mantenimiento/getAll"  class="w3-bar-item w3-button">Mantenimiento</a>
                <?php endif; ?>

          </div>
        </div>
            <div class="w3-bar w3-white w3-card" id="myNavbar">
                <div class="w3-right w3-hide-small">
                    <?php if(isset($_SESSION['identity'])&&isset($_SESSION['supervisor'])): ?>
                        <a href="<?=base_url?>empleado/getAll" class="w3-bar-item w3-button">Ver Empleados</a>
                        <a href="<?=base_url?>proforma/getAll"  class="w3-bar-item w3-button">Ver Proformas</a>
                        <a href="<?=base_url?>chofer/getAll"  class="w3-bar-item w3-button">Ver planilla Chofer</a>
                        <a href="<?=base_url?>viaje/getAll"  class="w3-bar-item w3-button">Ver viajes</a>
                        <a href="<?=base_url?>vehiculo/getAll"  class="w3-bar-item w3-button">Ver vehiculos</a>
                        <a href="<?=base_url?>mantenimiento/getAll"  class="w3-bar-item w3-button">Mantenimiento</a>
                    <?php endif; ?>

                </div>
            </div>
        <br>
             <div class="w3-middle">
                <div class="w3-bar w3-white w3-card" id="myNavbar">
                    <div class="w3-right w3-hide-small">
                        <?php if(isset($_SESSION['identity'])&&(isset($_SESSION['chofer'])||isset($_SESSION['mecanico']))): ?>
                            <a href="<?=base_url?>chofer/getAll"  class="w3-bar-item w3-button">Ver planilla Chofer</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="w3-middle">
                <div class="w3-bar w3-white w3-card" id="myNavbar">
                    <div class="w3-right w3-hide-small">
                        <?php if(isset($_SESSION['identity'])&&isset($_SESSION['encargado'])): ?>
                            <a href="<?=base_url?>mantenimiento/getAll"  class="w3-bar-item w3-button">Mantenimiento</a>                        <?php endif; ?>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>






