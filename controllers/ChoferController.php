<?php

require_once 'models/Chofer.php';

class choferController
{

    public function save()
    {
        if (isset($_POST)) {

            $latitud = isset($_POST['latitud']) ? $_POST['latitud'] : false;
            $longitud = isset($_POST['longitud']) ? $_POST['longitud'] : false;
            $kilometros = isset($_POST['kilometros']) ? $_POST['kilometros'] : false;
            $combustible = isset($_POST['combustible']) ? $_POST['combustible'] : false;
            $viaticos = isset($_POST['viaticos']) ? $_POST['viaticos'] : false;
            $peajesYPesajes = isset($_POST['peajesYPesajes']) ? $_POST['peajesYPesajes'] : false;
            $extras = isset($_POST['extras']) ? $_POST['extras'] : false;
            $fee = isset($_POST['fee']) ? $_POST['fee'] : false;
            $dni = isset($_POST['dni']) ? $_POST['dni'] : false;

           if ($latitud && $longitud && $kilometros && $combustible && $viaticos && $peajesYPesajes && $extras && $fee ) {
               $chofer = new Chofer();
               $chofer->setLatitud($latitud);
               $chofer->setLongitud($longitud);
               $chofer->setKilometros($kilometros);
               $chofer->setCombustible($combustible);
               $chofer->setViaticos($viaticos);
               $chofer->setPeajesYPesajes($peajesYPesajes);
               $chofer->setExtras($extras);
               $chofer->setFee($fee);
               $chofer->setDni($dni);
               $chofer->setTotal($chofer->calcularTotal());
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $chofer->setId($id);
                    $save = $chofer->editar();
                } else {
                    $save = $chofer->save();
                }

                if ($save) {
                    $_SESSION['chofer'] = "complete";
                } else {

                    $_SESSION['chofer'] = "failed";
                }
            } else {
                $_SESSION['chofer'] = "failed";
            }
        } else {
            $_SESSION['chofer'] = "failed";
        }
        if ($_SESSION['chofer'] == "complete") {
            if (Utils::isSupervisor()) {
                unset($_SESSION['chofer']);
            }
            header('Location:' . base_url);
        } else {
            if (Utils::isSupervisor()) {
                unset($_SESSION['chofer']);
            }
            header('Location:' . base_url . 'chofer/getAll');
        }
    }
    public function crear(){
        Utils::isChofer();
        require_once 'views/chofer/registroChofer.php';
    }
    public function editar(){
        Utils::isChofer();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $chofer = new Chofer();
            $chofer->setId($id);

            $pro = $chofer->getOne();

            require_once 'views/chofer/editarChofer.php';
        }else{
            header('Location:'.base_url.'chofer/getAll');
        }
    }

    public function getAll(){
        Utils::isChofer();
        $chofer = new Chofer();
        $choferes = $chofer->getAll();
        require_once 'views/chofer/gestionChofer.php';
    }

    public function eliminar(){
        Utils::isChofer();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $chofer = new Chofer();
            $chofer->setId($id);

            $delete = $chofer->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url. 'chofer/getAll');    }
    public function posicion(){

        $id = $_GET['id'];
        $chofer = new Chofer();
        $chofer->setId($id);
        $pro = $chofer->getOne();
       // $posicionamiento = $chofer->obtenerPosicion($chofer->getId());

        require_once 'views/chofer/ChoferQr.php';
    }

}