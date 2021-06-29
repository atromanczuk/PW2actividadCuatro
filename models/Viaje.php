<?php


class Viaje
{
    private $id;
    private $origen;
    private $destino;
    private $fecha_carga;
    private $ETA;
    public function __construct() {
        $this->db = Database::connect();
    }
    public function save(){
        $sql = "INSERT INTO viaje(id,destino,ETA,fecha_carga,origen) VALUES(NULL, '{$this->getDestino()}', '{$this->getETA()}', '{$this->getFechaCarga()}', '{$this->getOrigen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function editar(){
        $sql = "UPDATE viaje SET id='{$this->getId()}',destino='{$this->getDestino()}',ETA='{$this->getETA()}', fecha_carga='{$this->getFechaCarga()}',origen='{$this->getOrigen()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getAll(){
        $viajes = $this->db->query("SELECT * FROM viaje ORDER BY id DESC");
        return $viajes;
    }

    public function getOne(){
        $viaje = $this->db->query("SELECT * FROM viaje WHERE id = {$this->getId()}");
        return $viaje->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM viaje WHERE id={$this->id}";
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
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * @param mixed $origen
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    /**
     * @return mixed
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param mixed $destino
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getFechaCarga()
    {
        return $this->fecha_carga;
    }

    /**
     * @param mixed $fecha_carga
     */
    public function setFechaCarga($fecha_carga)
    {
        $this->fecha_carga = $fecha_carga;
    }

    /**
     * @return mixed
     */
    public function getETA()
    {
        return $this->ETA;
    }

    /**
     * @param mixed $ETA
     */
    public function setETA($ETA)
    {
        $this->ETA = $ETA;
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