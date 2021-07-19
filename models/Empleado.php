<?php


class Empleado{

    private $id;
    private $dni;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $tipo_licencia;
    private $tipo_empleado;


    public function __construct() {
        $this->db = Database::connect();
    }


    public function save(){
        $sql = "INSERT INTO empleado(id,dni,nombre,apellido,fecha_nacimiento,tipo_licencia,tipo_empleado) 
        VALUES(NULL, '{$this->getDni()}', '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getFechaNacimiento()}', '{$this->getTipoLicencia()}', '{$this->getTipoEmpleado()}'); ";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editar(){
        $sql = "UPDATE empleado SET id='{$this->getId()}',dni='{$this->getDni()}',nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',fecha_nacimiento='{$this->getFechaNacimiento()}',tipo_licencia='{$this->getTipoLicencia()}',tipo_empleado='{$this->getTipoEmpleado()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    public function getAll(){
        $empleados = $this->db->query("SELECT * FROM empleado ORDER BY id DESC");
        return $empleados;
    }

    public function getOne(){
        $empleado = $this->db->query("SELECT * FROM empleado WHERE id = {$this->getId()}");
        return $empleado->fetch_object();
    }


    public function delete(){
        $sql = "DELETE FROM empleado WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }


    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getTipoLicencia()
    {
        return $this->tipo_licencia;
    }

    /**
     * @param mixed $tipo_licencia
     */
    public function setTipoLicencia($tipo_licencia)
    {
        $this->tipo_licencia = $tipo_licencia;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipoEmpleado()
    {
        return $this->tipo_empleado;
    }

    /**
     * @param mixed $tipo_empleado
     */
    public function setTipoEmpleado($tipo_empleado): void
    {
        $this->tipo_empleado = $tipo_empleado;
    }





}