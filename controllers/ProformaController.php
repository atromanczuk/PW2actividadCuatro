<?php

require_once 'models/Proforma.php';

class ProformaController
{
    public function save(){
        if(isset($_POST)){

            $numero = isset($_POST['numero']) ? $_POST['numero'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;

            if($numero && $fecha){
                $proforma = new Proforma();
                $proforma->setNumero($numero);
                $proforma->setFecha($fecha);



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
            header('Location:' . base_url . 'views/proforma/registrarProforma.php');
        }
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $proforma = new Proforma();
            $proforma->setId($id);

            $pro = $proforma->getOne();

            require_once 'views/proforma/editarProforma.php';
        }else{
            header('Location:'.base_url.'views/proforma/gestionProformas.php');
        }
    }

    public function getAll(){
        header("Location:".base_url."views/proforma/gestionProformas.php");
    }

    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $proforma = new Proforma();
            $proforma->setId($id);

            $delete = $proforma->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
                header('Location:'.base_url);
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
            header('Location:'.base_url.'proforma/getAll');
        }

    }

}