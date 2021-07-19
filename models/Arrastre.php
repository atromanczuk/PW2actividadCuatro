<?php


class Arrastre{

    private $id;
    private $tipo;
    private $patente;
    private $chasis;

    public function __construct() {
        $this->db = Database::connect();
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
        $arrastres = $this->db->query("SELECT * FROM arrastre ORDER BY id DESC");
        return $arrastres;
    }

    public function save(){
        $sql = "INSERT INTO arrastre VALUES(NULL, '{$this->getTipo()}', '{$this->getPatente()}', '{$this->getChasis()}'";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function getOne(){
        $arrastre = $this->db->query("SELECT * FROM arrastre WHERE id = {$this->getId()}");
        return $arrastre->fetch_object();
    }

    public function editar(){
        $sql = "UPDATE arrastre SET id='{$this->getId()}',tipo='{$this->getTipo()}',patente='{$this->getPatente()}',chasis='{$this->getChasis()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM arrastre WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }


}