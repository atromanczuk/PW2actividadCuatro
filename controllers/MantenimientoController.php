<?php

require_once 'models/Mantenimiento.php';
require_once 'models/Vehiculo.php';
class mantenimientoController
{
    public function save(){
        Utils::isEncargado();
        if(isset($_POST)){


            $fecha_service = isset($_POST['fecha_service']) ? $_POST['fecha_service'] : false;
            $km_unidad = isset($_POST['km_unidad']) ? $_POST['km_unidad'] : false;
            $costo = isset($_POST['costo']) ? $_POST['costo'] : false;
            $service_interno = isset($_POST['service_interno']) ? $_POST['service_interno'] : false;
            $service_externo= isset($_POST['service_externo']) ? $_POST['service_externo'] : false;
            $mecanico = isset($_POST['mecanico']) ? $_POST['mecanico'] : false;
            $repuestos_cambiados = isset($_POST['repuestos_cambiados']) ? $_POST['repuestos_cambiados'] : false;
            $idVehiculo = isset($_POST['idVehiculo']) ? $_POST['idVehiculo'] : false;

            if($fecha_service && $costo && $service_interno && $service_externo && $mecanico && $repuestos_cambiados){
                $mantenimiento = new Mantenimiento();
                $mantenimiento ->setFechaService($fecha_service);
                $mantenimiento ->setCosto($costo);
                $mantenimiento ->setServiceInterno($service_interno);
                $mantenimiento ->setServiceExterno($service_externo);
                $mantenimiento ->setMecanico($mecanico);
                $mantenimiento ->setRepuestosCambiados($repuestos_cambiados);
                $mantenimiento ->setIdVehiculo($idVehiculo);
                $mantenimiento ->setKmUnidad($mantenimiento->verKmVehiculo($mantenimiento->getIdVehiculo()));
                $vehiculo = new Vehiculo();
                $vehiculo->setId($mantenimiento->getIdVehiculo());
                $ve=$vehiculo->getOne();
                $mantenimiento->actualizarKilometrosTotales($vehiculo->calcularKilometrosTotales($ve->kilometraje));
                $mantenimiento ->realizarServiceVehiculo($mantenimiento->getIdVehiculo());

                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $mantenimiento->setId($id);
                    $save = $mantenimiento->editar();
                }else{
                    $save = $mantenimiento->save();
                }

                if($save){
                    $_SESSION['mantenimiento'] = "complete";

                }else{
                    echo $mantenimiento->getId();
                    $_SESSION['mantenimiento'] = "failed";

                }
            }else{
                $_SESSION['mantenimiento'] = "failed";
            }
        }else{
            $_SESSION['mantenimiento'] = "failed";
        }
        if( $_SESSION['mantenimiento'] = "complete"){
            header('Location:'.base_url);
        }else {
            header('Location:' . base_url . 'mantenimiento/getAll');
        }
    }

    public function editar(){
        Utils::isEncargado();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $mantenimiento = new Mantenimiento();
            $mantenimiento->setId($id);

            $pro = $mantenimiento->getOne();

            require_once 'views/mantenimiento/editarMantenimiento.php';
        }else{
            header('Location:'.base_url.'mantenimiento/getAll');
        }
    }

    public function getAll(){
        Utils::isEncargado();
        $mantenimiento = new Mantenimiento();
        $mantenimientos= $mantenimiento->getAll();
        require_once 'views/mantenimiento/gestionMantenimiento.php';
    }
    public function crear(){
        Utils::isEncargado();
        require_once 'views/mantenimiento/registroMantenimiento.php';
    }
    public function eliminar(){
        Utils::isEncargado();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $mantenimiento = new Mantenimiento();
            $mantenimiento->setId($id);

            $delete = $mantenimiento->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
                header('Location:'.base_url. 'mantenimiento/getAll');
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
            header('Location:'.base_url. 'mantenimiento/getAll');      }

    }

}
