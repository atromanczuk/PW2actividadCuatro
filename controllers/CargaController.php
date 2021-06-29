<?php


require_once 'models/Carga.php';
class CargaController
{

    private $kilometros;
    private $combustible;
    private $ETD ;
    private $ETA ;
    private $viaticos;
    private $peajesYPesajes;
    private $extras;
    private $hazard ;
    private $reefer ;
    private $fee;
    private $total;
public function save()
{
    if (isset($_POST)) {

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
        $peso_neto = isset($_POST['peso_neto']) ? $_POST['peso_neto'] : false;
        $hazard = isset($_POST['hazard']) ? $_POST['hazard'] : false;
        $reefer = isset($_POST['reefer']) ? $_POST['reefer'] : false;
        $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : false;
        $IMOClass = isset($_POST['IMOClass']) ? $_POST['IMOClass'] : false;
        $IMOSclass = isset($_POST['IMOSclass']) ? $_POST['IMOSclass'] : false;

        if ($tipo && $peso_neto && $hazard && $reefer && $temperatura && $IMOClass && $IMOSclass) {
            $carga = new Carga();
            $carga->setTipo($tipo);
            $carga->setPesoNeto($peso_neto);
            $carga->setHazard($hazard);
            $carga->setReefer($reefer);
            $carga->setTemperatura($temperatura);
            $carga->setIMOClass($IMOClass);
            $carga->setIMOSclass($IMOSclass);


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $carga->setId($id);
                $save = $carga->editar();
            } else {
                $save = $carga->save();
            }

            if ($save) {
                $_SESSION['carga'] = "complete";
            } else {
                echo $carga->getId();
                $_SESSION['carga'] = "failed";
            }
        } else {
            $_SESSION['carga'] = "failed";
        }
    } else {
        $_SESSION['carga'] = "failed";
    }
    if ($_SESSION['carga'] = "complete") {
        header('Location:' . base_url);
    } else {
        header('Location:' . base_url . 'views/carga/registrarCarga.php');
    }
}
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $carga = new Carga();
            $carga->setId($id);

            $pro = $carga->getOne();

            require_once 'views/carga/editarCarga.php';
        }else{
            header('Location:'.base_url.'views/carga/gestionCargas.php');
        }
    }
    public function getAll(){
        header("Location:".base_url."views/carga/gestionCargas.php");
    }
    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $carga = new Carga();
            $carga->setId($id);

            $delete = $carga->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'gestion/getAll');
    }
}