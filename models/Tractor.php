<?php


class Tractor{

    private $id;
    private $marca;
    private $modelo;
    private $patente;
    private $motor;
    private $chasis;

    public function __construct() {
        $this->db = Database::connect();
    }

    /**
     * @return mysqli
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mysqli $db
     */
    public function setDb($db)
    {
        $this->db = $db;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getPatente()
    {
        return $this->patente;
    }

    /**
     * @param mixed $patente
     */
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    /**
     * @return mixed
     */
    public function getMotor()
    {
        return $this->motor;
    }

    /**
     * @param mixed $motor
     */
    public function setMotor($motor)
    {
        $this->motor = $motor;
    }

    /**
     * @return mixed
     */
    public function getChasis()
    {
        return $this->chasis;
    }

    /**
     * @param mixed $chasis
     */
    public function setChasis($chasis)
    {
        $this->chasis = $chasis;
    }

    public function getAll(){
        $tractores = $this->db->query("SELECT * FROM tractor ORDER BY id DESC");
        return $tractores;
    }

    public function save(){
        $sql = "INSERT INTO tractor VALUES(NULL, '{$this->getMarca()}', '{$this->getModelo()}', '{$this->getPatente()}', '{$this->getMotor()}', ''{$this->getChasis()}";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function getOne(){
        $tractor = $this->db->query("SELECT * FROM tractor WHERE id = {$this->getId()}");
        return $tractor->fetch_object();
    }

    public function editar(){
        $sql = "UPDATE tractor SET id='{$this->getId()}',marca='{$this->getMarca()}',modelo='{$this->getModelo()}',patente='{$this->getPatente()}',motor='{$this->getMotor()}',chasis='{$this->getChasis()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM tractor WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

}