<?php

class Chofer
{
    private $id;
    private $latitud;
    private $longitud;
    private $kilometros;
    private $combustible;
    private $viaticos;
    private $peajesYPesajes;
    private $extras;
    private $fee;
    private $total;
    private $dni;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function save()
    {
        $sql = "INSERT INTO chofer(id,latitud,longitud,kilometros,combustible,viaticos,peajesYPesajes,extras,fee,dni,total) 
        VALUES(NULL,'{$this->getLatitud()}', '{$this->getLongitud()}','{$this->getKilometros()}', '{$this->getCombustible()}','{$this->getViaticos()}','{$this->getPeajesYPesajes()}', '{$this->getExtras()}','{$this->getFee()}','{$this->getDni()}','{$this->getTotal()}');";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editar()
    {
        $sql = "UPDATE chofer SET id='{$this->getId()}',kilometros='{$this->getKilometros()}',combustible='{$this->getCombustible()}',viaticos='{$this->getViaticos()}',peajesYPesajes='{$this->getPeajesYPesajes()}',extras='{$this->getExtras()}',fee='{$this->getFee()}',total='{$this->getTotal()}',longitud='{$this->getLongitud()}',latitud='{$this->getLatitud()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function calcularTotal(){
        $peaje=250;
        $calculoTotalCombustible = ($this->getCombustible() * $this->getKilometros());
        $totalPeajeYPesaje= ($peaje * $this->getPeajesYPesajes());
        $totalCompleto=($calculoTotalCombustible)+($totalPeajeYPesaje)+($this->getFee())+($this->getExtras())+($this->getViaticos());
        $this->setTotal($totalCompleto);
        $sql = "UPDATE chofer SET total='{$this->getTotal()}'";
        $sql .= " WHERE id={$this->id};";

        $this->db->query($sql);

        return $this->getTotal();
    }
    public function getAll(){
        $chofer = $this->db->query("SELECT * FROM chofer ORDER BY id DESC");

        return $chofer;
    }

    public function getOne(){
        $chofer = $this->db->query("SELECT * FROM chofer WHERE id = {$this->getId()}");
        return $chofer->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM chofer WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    public function obtenerPosicion($idChofer){
        $sql = "SELECT c.latitud,c.longitud from chofer as c where c.id = '{$idChofer}'";
        $posicionamiento= mysqli_query($this->db, $sql);
        return mysqli_fetch_array($posicionamiento);
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
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }



    /**
     * @return mixed
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * @param mixed $kilometros
     */
    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;
    }

    /**
     * @return mixed
     */
    public function getCombustible()
    {
        return $this->combustible;
    }

    /**
     * @param mixed $combustible
     */
    public function setCombustible($combustible)
    {
        $this->combustible = $combustible;
    }

    /**
     * @return mixed
     */
    public function getViaticos()
    {
        return $this->viaticos;
    }

    /**
     * @param mixed $viaticos
     */
    public function setViaticos($viaticos)
    {
        $this->viaticos = $viaticos;
    }

    /**
     * @return mixed
     */
    public function getPeajesYPesajes()
    {
        return $this->peajesYPesajes;
    }

    /**
     * @param mixed $peajesYPesajes
     */
    public function setPeajesYPesajes($peajesYPesajes)
    {
        $this->peajesYPesajes = $peajesYPesajes;
    }

    /**
     * @return mixed
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param mixed $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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

}



?>