<?php


class Proforma
{
    private  $id;
  private  $numero;
  private $fecha;
    public function __construct() {
        $this->db = Database::connect();
    }

    public function save(){
        $sql = "INSERT INTO proforma(id,numero,fecha) VALUES(NULL, '{$this->getNumero()}', '{$this->getFecha()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function editar(){
        $sql = "UPDATE proforma SET id='{$this->getId()}',numero='{$this->getNumero()}',fecha='{$this->getFecha()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getAll(){
        $proformas = $this->db->query("SELECT * FROM proforma ORDER BY id DESC");
        return $proformas;
    }
    public function getOne(){
        $proforma = $this->db->query("SELECT * FROM proforma WHERE id = {$this->getId()}");
        return $proforma->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM proforma WHERE id={$this->id}";
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

}