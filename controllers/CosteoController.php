<?php

require_once 'models/Costeo.php';
class CosteoController
{
    public function save()
    {
        if (isset($_POST)) {

            $kilometros = isset($_POST['kilometros']) ? $_POST['kilometros'] : false;
            $combustible = isset($_POST['combustible']) ? $_POST['combustible'] : false;
            $hazard = isset($_POST['hazard']) ? $_POST['hazard'] : false;
            $reefer = isset($_POST['reefer']) ? $_POST['reefer'] : false;
            $ETD = isset($_POST['ETD']) ? $_POST['ETD'] : false;
            $ETA = isset($_POST['ETA']) ? $_POST['ETA'] : false;
            $extras = isset($_POST['extras']) ? $_POST['extras'] : false;
            $fee = isset($_POST['fee']) ? $_POST['fee'] : false;
            $peajesYPesajes = isset($_POST['peajesYPesajes']) ? $_POST['peajesYPesajes'] : false;
            $total = isset($_POST['total']) ? $_POST['total'] : false;
            $viaticos = isset($_POST['viaticos']) ? $_POST['viaticos'] : false;


            if ($combustible && $kilometros && $hazard && $reefer && $ETD && $ETA && $extras&&$fee&&$peajesYPesajes&&$total&&$viaticos) {
                $costeo = new Costeo();
                $costeo->setCombustible($combustible);
                $costeo->setKilometros($kilometros);
                $costeo->setHazard($hazard);
                $costeo->setReefer($reefer);
                $costeo->setETA($ETA);
                $costeo->setETD($ETD);
                $costeo->setExtras($extras);
                $costeo->setFee($fee);
                $costeo->setPeajesYPesajes($peajesYPesajes);
                $costeo->setTotal($total);
                $costeo->setViaticos($viaticos);


                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $costeo->setId($id);
                    $save = $costeo->editar();
                } else {
                    $save = $costeo->save();
                }

                if ($save) {
                    $_SESSION['costeo'] = "complete";
                } else {
                    echo $costeo->getId();
                    $_SESSION['costeo'] = "failed";
                }
            } else {
                $_SESSION['costeo'] = "failed";
            }
        } else {
            $_SESSION['costeo'] = "failed";
        }
        if ($_SESSION['costeo'] = "complete") {
            header('Location:' . base_url);
        } else {
            header('Location:' . base_url . 'views/costeo/registrarCosteo.php');
        }
    }
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $costeo = new Costeo();
            $costeo->setId($id);

            $pro = $costeo->getOne();

            require_once 'views/costeo/editarCosteo.php';
        }else{
            header('Location:'.base_url.'views/costeo/gestionarCosteo.php');
        }
    }
    public function getAll(){
        header("Location:".base_url."views/costeo/gestionarCosteo.php");
    }
    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $costeo = new Costeo();
            $costeo->setId($id);

            $delete = $costeo->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
                header('Location:'.base_url);
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
            header('Location:'.base_url.'costeo/getAll');
        }

    }
}