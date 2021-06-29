<?php


class Costeo
{
    private $id;
    private $kilometros;
    private $combustible;
    private $ETD ;
    private $ETA ;
    private $viaticos;
    private $peajesYPesajes;
    private $extras;
    private $hazard ;
    private $reefer ;
    private $fee;
    private $total;
    public function __construct() {
        $this->db = Database::connect();
    }

    public function save(){
        $sql = "INSERT INTO costeo(id,kilometros,combustible,ETD,ETA,viaticos,peajesYPesajes,extras,hazard,reefer,fee,total)
 VALUES(NULL, '{$this->getKilometros()}', '{$this->getCombustible()}', '{$this->getETD()}', '{$this->getETA()}','{$this->getViaticos()}','{$this->getPeajesYPesajes()}','{$this->getExtras()}','{$this->getHazard()}','{$this->getReefer()}','{$this->getFee()}','{$this->getTotal()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function editar(){
        $sql = "UPDATE costeo SET id='{$this->getId()}',kilometros='{$this->getKilometros()}',combustible='{$this->getCombustible()}', ETD='{$this->getETD()}',ETA='{$this->getETA()}',viaticos='{$this->getViaticos()}',peajesYPesajes='{$this->getPeajesYPesajes()}',extras='{$this->getExtras()}',hazard='{$this->getHazard()}',reefer='{$this->getReefer()}',fee='{$this->getFee()}',total='{$this->getTotal()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getAll(){
        $costeos = $this->db->query("SELECT * FROM costeo ORDER BY id DESC");
        return $costeos;
    }

    public function getOne(){
        $costeo = $this->db->query("SELECT * FROM costeo WHERE id = {$this->getId()}");
        return $costeo->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM costeo WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }



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
    public function getETD()
    {
        return $this->ETD;
    }

    /**
     * @param mixed $ETD
     */
    public function setETD($ETD)
    {
        $this->ETD = $ETD;
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