<?php

require_once 'models/Viaje.php';
class ViajeController
{

    public function save(){
        if(isset($_POST)){

            $ETA = isset($_POST['ETA']) ? $_POST['ETA'] : false;
            $fecha_carga = isset($_POST['fecha_carga']) ? $_POST['fecha_carga'] : false;
            $destino = isset($_POST['destino']) ? $_POST['destino'] : false;
            $origen = isset($_POST['origen']) ? $_POST['origen'] : false;

            if($ETA && $fecha_carga && $destino && $origen){
                $viaje = new Viaje();
                $viaje->setDestino($destino);
                $viaje->setETA($ETA);
                $viaje->setFechaCarga($fecha_carga);
                $viaje->setOrigen($origen);


                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $viaje->setId($id);
                    echo "pase por aca";
                    $save = $viaje->editar();
                }else{
                    $save = $viaje->save();
                }

                if($save){
                    $_SESSION['viaje'] = "complete";
                    echo "es trueeee";
                }else{
                    echo $viaje->getId();
                    $_SESSION['viaje'] = "failed";
                    echo "es falseeeee";
                }
            }else{
                $_SESSION['viaje'] = "failed";
            }
        }else{
            $_SESSION['viaje'] = "failed";
        }
        if( $_SESSION['viaje'] = "complete"){
            header('Location:'.base_url);
        }else {
            header('Location:' . base_url . 'views/viaje/registrarViaje.php');
        }
    }


    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $viaje = new Viaje();
            $viaje->setId($id);

            $pro = $viaje->getOne();

            require_once 'views/viaje/editarViaje.php';
        }else{
            header('Location:'.base_url.'views/viaje/gestionViajes.php');
        }
    }
    public function getAll(){
        header("Location:".base_url."views/viaje/gestionViajes.php");
    }
    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $viaje = new Viaje();
            $viaje->setId($id);

            $delete = $viaje->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
                header('Location:'.base_url);
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
            header('Location:'.base_url.'viaje/getAll');
        }

    }
}