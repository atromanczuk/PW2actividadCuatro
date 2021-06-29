<?php


class Carga
{
    private $id;
    private $tipo;
    private $peso_neto;
    private $hazard;
    private $reefer;
    private $temperatura;
    private $IMOClass;
    private $IMOSclass;


    public function __construct() {
        $this->db = Database::connect();
    }
    public function save(){
        $sql = "INSERT INTO carga(id,tipo,peso_neto,hazard,reefer,temperatura,IMOClass,IMOSclass) 
VALUES(NULL,'{$this->getTipo()}','{$this->getPesoNeto()}', '{$this->getHazard()}', '{$this->getReefer()}','{$this->getTemperatura()}','{$this->getIMOClass()}', '{$this->getIMOSclass()}');";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            echo '<script>';
            echo 'console.log('. json_encode( "es TRUEEEEEEEEEE" ) .')';
            echo '</script>';
            $result = true;
        }
        echo 'console.log('. json_encode( "es FALSEEE" ) .')';

        return $result;
    }
    public function editar(){
        $sql = "UPDATE carga SET id='{$this->getId()}',tipo='{$this->getTipo()}',peso_neto='{$this->getPesoNeto()}', hazard='{$this->getHazard()}',reefer='{$this->getReefer()}',temperatura='{$this->getTemperatura()}',IMOClass='{$this->getIMOClass()}',IMOSclass='{$this->getIMOSclass()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getAll(){
        $cargas = $this->db->query("SELECT * FROM carga ORDER BY id DESC");
        return $cargas;
    }

    public function getOne(){
        $carga = $this->db->query("SELECT * FROM carga WHERE id = {$this->getId()}");
        return $carga->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM carga WHERE id={$this->id}";
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getPesoNeto()
    {
        return $this->peso_neto;
    }

    /**
     * @param mixed $peso_neto
     */
    public function setPesoNeto($peso_neto)
    {
        $this->peso_neto = $peso_neto;
    }

    /**
     * @return mixed
     */
    public function getHazard()
    {
        return $this->hazard;
    }

    /**
     * @param mixed $hazard
     */
    public function setHazard($hazard)
    {
        $this->hazard = $hazard;
    }

    /**
     * @return mixed
     */
    public function getReefer()
    {
        return $this->reefer;
    }

    /**
     * @param mixed $reefer
     */
    public function setReefer($reefer)
    {
        $this->reefer = $reefer;
    }

    /**
     * @return mixed
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * @param mixed $temperatura
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;
    }

    /**
     * @return mixed
     */
    public function getIMOClass()
    {
        return $this->IMOClass;
    }

    /**
     * @param mixed $IMOClass
     */
    public function setIMOClass($IMOClass)
    {
        $this->IMOClass = $IMOClass;
    }

    /**
     * @return mixed
     */
    public function getIMOSclass()
    {
        return $this->IMOSclass;
    }

    /**
     * @param mixed $IMOSclass
     */
    public function setIMOSclass($IMOSclass)
    {
        $this->IMOSclass = $IMOSclass;
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

}