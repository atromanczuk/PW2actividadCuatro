<?php
require_once 'models/Viaje.php';

class viajeController{

    public function save()
    {
        Utils::isSupervisor();
        if (isset($_POST)) {

            $vehiculo = isset($_POST['vehiculo']) ? $_POST['vehiculo'] : false;
            $origen = isset($_POST['origen']) ? $_POST['origen'] : false;
            $destino = isset($_POST['destino']) ? $_POST['destino'] : false;
            $chofer = isset($_POST['chofer']) ? $_POST['chofer'] : false;
            $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : false;
            $tipo_carga = isset($_POST['tipo_carga']) ? $_POST['tipo_carga'] : false;
            $fecha= isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $tiempo_estimado_viaje = isset($_POST['tiempo_estimado_viaje']) ? $_POST['tiempo_estimado_viaje'] : false;
            $tiempo_real = isset($_POST['tiempo_real']) ? $_POST['tiempo_real'] : false;
            $desviacion = isset($_POST['desviacion']) ? $_POST['desviacion'] : false;
            $kilometros_recorridos_previstos = isset($_POST['kilometros_recorridos_previstos']) ? $_POST['kilometros_recorridos_previstos'] : false;
            $kilometros_recorridos_reales = isset($_POST['kilometros_recorridos_reales']) ? $_POST['kilometros_recorridos_reales'] : false;
            $combustible_consumido_previsto = isset($_POST['combustible_consumido_previsto']) ? $_POST['combustible_consumido_previsto'] : false;
            $combustible_consumido_real = isset($_POST['combustible_consumido_real']) ? $_POST['combustible_consumido_real'] : false;





            if ($vehiculo && $origen && $destino && $chofer && $cliente && $tipo_carga && $fecha && $tiempo_estimado_viaje && $tiempo_real && $desviacion && $kilometros_recorridos_previstos && $kilometros_recorridos_reales &&  $combustible_consumido_previsto && $combustible_consumido_real) {
                $viaje = new Viaje();
                $viaje->setVehículo($vehiculo);
                $viaje->setOrigen($origen);
                $viaje->setDestino($destino);
                $viaje->setChofer($chofer);
                $viaje->setCliente($cliente);
                $viaje->setTipoCarga($tipo_carga);
                $viaje->setFecha($fecha);
                $viaje->setTiempoEstimadoViaje($tiempo_estimado_viaje);
                $viaje->setTiempoReal($tiempo_real);
                $viaje->setDesviacion($desviacion);
                $viaje->setKilometrosRecorridosPrevistos($kilometros_recorridos_previstos);
                $viaje->setKilometrosRecorridosReales($kilometros_recorridos_reales);
                $viaje->setCombustibleConsumidoPrevisto($combustible_consumido_previsto);
                $viaje->setCombustibleConsumidoReal($combustible_consumido_real);

                $analizarMantenimiento = $viaje->analizarMantenimiento($viaje->getVehículo());


                if ($analizarMantenimiento['kilometraje'] >= '100000') {
                    $_SESSION['analisisMantenimiento'] = "failed";
                    $_SESSION['viaje'] = "failed";
                    require_once 'views/viaje/registroViaje.php';
                }else{
                    $_SESSION['analisisMantenimiento'] = "complete";

                if ($_SESSION['analisisMantenimiento'] == "complete") {

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $viaje->setId($id);
                    $save = $viaje->editar();
                } else {
                    $save = $viaje->save();
                }

                if ($save) {
                    $_SESSION['viaje'] = "complete";
                } else {
                    $_SESSION['viaje'] = "failed";
                }
                }
                }


            } else {
                $_SESSION['viaje'] = "failed";
                header('Location:' . base_url . 'viaje/crear');
            }
            } else {
            $_SESSION['viaje'] = "failed";
            header('Location:' . base_url . 'viaje/crear');
        }if(  $_SESSION['viaje'] == "complete") {
        Utils::deleteSession('analisisMantenimiento');

        Utils::deleteSession('viaje');
        header('Location:' . base_url);
        }else{
        Utils::deleteSession('analisisMantenimiento');

        Utils::deleteSession('viaje');
        require_once 'views/viaje/registroViaje.php';
    }


    }
    public function crear(){
        Utils::isSupervisor();
        require_once 'views/viaje/registroViaje.php';
    }
    public function editar(){
        Utils::isSupervisor();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $viaje = new Viaje();
            $viaje->setId($id);

            $pro = $viaje->getOne();

            require_once 'views/viaje/editarViaje.php';
        }else{
            header('Location:'.base_url.'viaje/getAll');
        }
    }

    public function getAll(){
        Utils::isSupervisor();
        $viaje = new Viaje();
        $viajes = $viaje->getAll();
        require_once 'views/viaje/gestionViaje.php';
    }

    public function eliminar(){
        Utils::isSupervisor();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $viaje = new Viaje();
            $viaje->setId($id);

            $delete = $viaje->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'viaje/getAll');    }
    public function finalizar()
    {
        Utils::isSupervisor();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $viaje = new Viaje();
            $viaje->setId($id);
            $model = $viaje->getOne();
            $proforma = $viaje->obtenerProforma($model->id);
            $facturaFinalChofer = $viaje->obtenerFacturaFinalChofer($model->chofer);
            // $finalizar = $viaje->finalizar();
            $finalizar = true;
            require_once 'views/viaje/finalizarViaje.php';


        }
    }

}