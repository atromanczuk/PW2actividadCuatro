<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}

    public static function isChofer(){
        if((!isset($_SESSION['chofer'])) && (!isset($_SESSION['admin']))&& (!isset($_SESSION['supervisor']))&& (!isset($_SESSION['mecanico']))){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
    public static function isEncargado(){
        if((!isset($_SESSION['encargado'])) && (!isset($_SESSION['admin']))&& (!isset($_SESSION['supervisor']))){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
    public static function isSupervisor(){
        if((!isset($_SESSION['supervisor'])) && (!isset($_SESSION['admin']))){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

	
}
