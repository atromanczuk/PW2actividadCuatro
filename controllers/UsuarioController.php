<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){

	}
	
	public function registro(){

		require_once 'views/usuario/registro.php';
	}

    public function save(){
		if(isset($_POST)){


            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$rol= isset($_POST['rol']) ? $_POST['rol'] : false;

			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				if(isset($_POST['rol'])) {
                    $usuario->setRol($rol);

                }
                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $usuario->setId($id);

                    $save = $usuario->editar();
                }else{
                    $save = $usuario->save();
                }
				if($save){
					$_SESSION['register'] = "complete";
                    $_SESSION['usuario'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
                    $_SESSION['usuario'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
         require_once('mailer/correo.php');

            }else{
			$_SESSION['register'] = "failed";
		}

	}
	
	public function login(){
		if(isset($_POST)){

			$usuario = new Usuario();
			if(isset($_POST['email'])&&isset($_POST['password'])){
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();

			if($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->rol == 'chofer') {
                    $_SESSION['chofer'] = true;
                }
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                if ($identity->rol == 'supervisor') {
                    $_SESSION['supervisor'] = true;
                }
                if ($identity->rol == 'mecanico') {
                    $_SESSION['mecanico'] = true;
                }
                if ($identity->rol == 'encargado') {
                    $_SESSION['encargado'] = true;
                }
                header("Location:" . base_url);
            }
			}else{

				$_SESSION['error_login'] = 'Identificación fallida !!';
                require_once 'views/usuario/login.php';
			}


		}
	}

	public function editar(){
	    Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $usuario = new Usuario();
            $usuario->setId($id);

            $pro = $usuario->getOne();

            require_once 'views/usuario/editar.php';

        }else{
            header('Location:'.base_url.'usuario/getAll');
        }
    }

	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        if(isset($_SESSION['supervisor'])){
            unset($_SESSION['supervisor']);
        }
        if(isset($_SESSION['encargado'])){
            unset($_SESSION['encargado']);
        }
        if(isset($_SESSION['mecanico'])){
            unset($_SESSION['mecanico']);
        }
        if(isset($_SESSION['chofer'])){
            unset($_SESSION['chofer']);
        }
		header("Location:".base_url."usuario/login");
	}
    public function getAll(){
        Utils::isAdmin();
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require_once 'views/usuario/gestion.php';
    }
    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);

            $delete = $usuario->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';

        }
        header('Location:'.base_url.'usuario/getAll');
    }
}