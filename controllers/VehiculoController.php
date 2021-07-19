<?php

require_once 'models/Vehiculo.php';

class vehiculoController{

public static $contadorId=0;

    public function save()
    {
        if (isset($_POST)) {

            $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
            $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : false;
            $patente = isset($_POST['patente']) ? $_POST['patente'] : false;
            $nro_chasis = isset($_POST['nro_chasis']) ? $_POST['nro_chasis'] : false;
            $nro_motor = isset($_POST['nro_motor']) ? $_POST['nro_motor'] : false;
            $anio_fabricacion = isset($_POST['anio_fabricacion']) ? $_POST['anio_fabricacion'] : false;
            $calendarizacion_service = isset($_POST['calendarizacion_service']) ? $_POST['calendarizacion_service'] : false;
            $kilometraje = isset($_POST['kilometraje']) ? $_POST['kilometraje'] : false;
            $kilometros_totales = isset($_POST['kilometros_totales']) ? $_POST['kilometros_totales'] : false;

            if ($marca && $modelo && $patente && $nro_chasis && $nro_motor && $anio_fabricacion && $calendarizacion_service && $kilometraje ) {
                $vehiculo = new Vehiculo();
                $vehiculo->setMarca($marca);
                $vehiculo->setModelo($modelo);
                $vehiculo->setPatente($patente);
                $vehiculo->setNroChasis($nro_chasis);
                $vehiculo->setNroMotor($nro_motor);
                $vehiculo->setAnioFabricacion($anio_fabricacion);
                $vehiculo->setCalendarizacionService($calendarizacion_service);
                $vehiculo->setKilometraje($kilometraje);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $vehiculo->setId($id);
                    $vehiculo->setKilometrosTotales(($vehiculo->calcularKilometrosTotales($vehiculo->getKilometraje())));
                    $save = $vehiculo->editar();


                } else {
                    $vehiculo->setKilometrosTotales2($vehiculo->getKilometraje());
                    $save = $vehiculo->save();


                }


                if ($save) {

                    $_SESSION['vehiculo'] = "complete";
                } else {
                    $_SESSION['vehiculo'] = "failed";
                }
            } else {
                $_SESSION['vehiculo'] = "failed";
            }
        } else {
            $_SESSION['vehiculo'] = "failed";
        }
        if ($_SESSION['vehiculo'] = "complete") {
            header('Location:' . base_url);
        } else {
            header('Location:' . base_url . 'vehiculo/getAll');
        }
    }
    public function crear(){
        Utils::isSupervisor();
        require_once 'views/vehiculo/registrarVehiculo.php';
    }
    public function editar(){
        Utils::isSupervisor();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);

            $pro = $vehiculo->getOne();

            require_once 'views/vehiculo/editarVehiculo.php';
        }else{
            header('Location:'.base_url.'vehiculo/getAll');
        }
    }

    /**
     * @return int
     */
    public static function getContadorId(): int
    {
        return self::$contadorId;
    }

    /**
     * @param int $contadorId
     */
    public static function setContadorId(int $contadorId): void
    {
        self::$contadorId = $contadorId;
    }

    public function getAll(){
        Utils::isSupervisor();
        $vehiculo = new Vehiculo();
        $vehiculos = $vehiculo->getAll();
        require_once 'views/vehiculo/gestionVehiculo.php';
    }

    public function eliminar(){
        Utils::isSupervisor();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);

            $delete = $vehiculo->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'vehiculo/getAll');    }

}