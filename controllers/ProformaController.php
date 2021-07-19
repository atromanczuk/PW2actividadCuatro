<?php

require_once 'models/Proforma.php';

class proformaController
{
    public function save(){
        Utils::isSupervisor();
        if(isset($_POST)){

            $numero = isset($_POST['numero']) ? $_POST['numero'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $denominacion = isset($_POST['denominacion']) ? $_POST['denominacion'] : false;
            $cuit = isset($_POST['cuit']) ? $_POST['cuit'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $contactoUno = isset($_POST['contactoUno']) ? $_POST['contactoUno'] : false;
            $contactoDos = isset($_POST['contactoDos']) ? $_POST['contactoDos'] : false;
            $origen = isset($_POST['origen']) ? $_POST['origen'] : false;
           $destino = isset($_POST['destino']) ? $_POST['destino'] : false;
            $fecha_carga = isset($_POST['fecha_carga']) ? $_POST['fecha_carga'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $peso_neto = isset($_POST['peso_neto']) ? $_POST['peso_neto'] : false;
            $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : false;
            $IMOClass = isset($_POST['IMOClass']) ? $_POST['IMOClass'] : false;
            $IMOSclass = isset($_POST['IMOSclass']) ? $_POST['IMOSclass'] : false;
            $kilometros = isset($_POST['kilometros']) ? $_POST['kilometros'] : false;
            $combustible = isset($_POST['combustible']) ? $_POST['combustible'] : false;
            $ETD = isset($_POST['ETD']) ? $_POST['ETD'] : false;
            $ETA = isset($_POST['ETA']) ? $_POST['ETA'] : false;
            $viaticos = isset($_POST['viaticos']) ? $_POST['viaticos'] : false;
            $peajesYPesajes = isset($_POST['peajesYPesajes']) ? $_POST['peajesYPesajes'] : false;
            $extras = isset($_POST['extras']) ? $_POST['extras'] : false;
            $hazard = isset($_POST['hazard']) ? $_POST['hazard'] : false;
            $reefer = isset($_POST['reefer']) ? $_POST['reefer'] : false;
            $fee = isset($_POST['fee']) ? $_POST['fee'] : false;
            $total = isset($_POST['total']) ? $_POST['total'] : false;
            $idViaje= isset($_POST['idViaje']) ? $_POST['idViaje'] : false;



            if($numero && $fecha){
                $proforma = new Proforma();
                $proforma->setNumero($numero);
                $proforma->setFecha($fecha);
                $proforma->setDenominacion($denominacion);
                $proforma->setCuit($cuit);
                $proforma->setDireccion($direccion);
                $proforma->setTelefono($telefono);
                $proforma->setEmail($email);
                $proforma->setContactoUno($contactoUno);
                $proforma->setContactoDos($contactoDos);
                $proforma->setOrigen($origen);
                $proforma->setDestino($destino);
                $proforma->setFechaCarga($fecha_carga);
                $proforma->setTipo($tipo);
                $proforma->setPesoNeto($peso_neto);
                $proforma->setTemperatura($temperatura);
                $proforma->setIMOClass($IMOClass);
                $proforma->setIMOSclass($IMOSclass);
                $proforma->setKilometros($kilometros);
                $proforma->setCombustible($combustible);
                $proforma->setETD($ETD);
                $proforma->setETA($ETA);
                $proforma->setViaticos($viaticos);
                $proforma->setPeajesYPesajes($peajesYPesajes);
                $proforma->setExtras($extras);
                $proforma->setHazard($hazard);
                $proforma->setReefer($reefer);
                $proforma->setFee($fee);
                $proforma->setIdViaje($idViaje);
                $proforma->setTotal($proforma->calcularTotal());


                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $proforma->setId($id);
                    $save = $proforma->editar();
                }else{
                    $save = $proforma->save();
                }

                if($save){
                    $_SESSION['proforma'] = "complete";

                }else{
                    echo $proforma->getId();
                    $_SESSION['proforma'] = "failed";

                }
            }else{
                $_SESSION['proforma'] = "failed";
            }
        }else{
            $_SESSION['proforma'] = "failed";
        }
        if( $_SESSION['proforma'] = "complete"){
            header('Location:'.base_url);
        }else {
            header('Location:' . base_url . 'proforma/getAll');
        }
    }

    public function editar(){
        Utils::isSupervisor();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $proforma = new Proforma();
            $proforma->setId($id);

            $pro = $proforma->getOne();

            require_once 'views/proforma/editarProforma.php';
        }else{
            header('Location:'.base_url.'proforma/getAll');
        }
    }

    public function getAll(){
        Utils::isSupervisor();
        $proforma = new Proforma();
        $proformas = $proforma->getAll();
        require_once 'views/proforma/gestionProformas.php';
    }
    public function crear(){
        Utils::isSupervisor();
        require_once 'views/proforma/registrarProforma.php';
    }
    public function eliminar(){
        Utils::isSupervisor();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $proforma = new Proforma();
            $proforma->setId($id);

            $delete = $proforma->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
                header('Location:'.base_url.'proforma/getAll');
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
            header('Location:'.base_url.'proforma/getAll');
        }

    }

}