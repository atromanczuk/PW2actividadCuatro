<?php

require_once 'models/Empleado.php';

class EmpleadoController{
    public function save()
    {
        if (isset($_POST)) {

            $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
            $tipo_licencia = isset($_POST['tipo_licencia']) ? $_POST['tipo_licencia'] : false;
            $tipo_empleado = isset($_POST['tipo_empleado']) ? $_POST['tipo_empleado'] : false;


            if ($dni && $nombre && $apellido && $fecha_nacimiento && $tipo_licencia & $tipo_empleado) {
                $empleado = new Empleado();
                $empleado->setdni($dni);
                $empleado->setNombre($nombre);
                $empleado->setApellido($apellido);
                $empleado->setFechaNacimiento($fecha_nacimiento);
                $empleado->setTipoLicencia($tipo_licencia);
                $empleado->setTipoEmpleado($tipo_empleado);



                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $empleado->setId($id);
                    $save = $empleado->editar();
                } else {
                    $save = $empleado->save();
                }

                if ($save) {
                    $_SESSION['empleado'] = "complete";
                } else {
                    echo $empleado->getId();
                    $_SESSION['empleado'] = "failed";
                }
            } else {
                $_SESSION['empleado'] = "failed";
            }
        } else {
            $_SESSION['empleado'] = "failed";
        }
        if ($_SESSION['empleado'] = "complete") {
            header('Location:' . base_url);
        } else {
            header('Location:' . base_url . 'empleado/getAll');
        }
    }
    public function crear(){
        Utils::isSupervisor();
        require_once 'views/empleado/registroEmpleado.php';
    }
    public function editar(){
        Utils::isSupervisor();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $empleado = new Empleado();
            $empleado->setId($id);

            $pro = $empleado->getOne();

            require_once 'views/empleado/editarEmpleado.php';
        }else{
            header('Location:'.base_url.'empleado/getAll');
        }
    }

    public function getAll(){
        Utils::isSupervisor();
        $empleado = new Empleado();
        $empleados = $empleado->getAll();
        require_once 'views/empleado/gestionEmpleado.php';
    }

    public function eliminar(){
        Utils::isSupervisor();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $empleado = new Empleado();
            $empleado->setId($id);

            $delete = $empleado->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url. 'empleado/getAll');
    }


}