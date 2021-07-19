<?php


class Proforma
{
  private $id;
  private $numero;
  private $fecha;
  private $denominacion;

  private $cuit;
  private $direccion;
  private $telefono;
  private $email;

  private $contactoUno;
  private $contactoDos;
  private $origen;
  private $destino;

  private $fecha_carga;
  private $tipo;
  private $peso_neto;
  private $temperatura;

  private $IMOClass;
  private $IMOSclass;
  private $kilometros;
  private $combustible;

  private $ETD;
  private $ETA;
  private $viaticos;
  private $peajesYPesajes;

  private $extras;
  private $hazard;
  private $reefer;
  private $fee;
  private $total;
  private $idViaje;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function save(){
        $sql = "INSERT INTO proforma(id,numero,fecha,denominacion,cuit,direccion,telefono,email,contactoUno,contactoDos,origen,destino,fecha_carga,tipo,peso_neto,temperatura,IMOClass,IMOSclass,kilometros,combustible,ETD,ETA,viaticos,peajesYPesajes,extras,hazard,reefer,fee,total,idViaje) 
        VALUES(NULL, '{$this->getNumero()}', '{$this->getFecha()}','{$this->getDenominacion()}','{$this->getCuit()}','{$this->getDireccion()}','{$this->getTelefono()}','{$this->getEmail()}','{$this->getContactoUno()}','{$this->getContactoDos()}','{$this->getOrigen()}','{$this->getDestino()}','{$this->getFechaCarga()}','{$this->getTipo()}','{$this->getPesoNeto()}','{$this->getTemperatura()}','{$this->getIMOClass()}','{$this->getIMOSclass()}','{$this->getKilometros()}','{$this->getCombustible()}','{$this->getETD()}','{$this->getETA()}','{$this->getViaticos()}','{$this->getPeajesYPesajes()}','{$this->getExtras()}','{$this->getHazard()}','{$this->getReefer()}','{$this->getFee()}','{$this->getTotal()}','{$this->getIdViaje()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function editar(){
        $sql = "UPDATE proforma SET id='{$this->getId()}',numero='{$this->getNumero()}',fecha='{$this->getFecha()}',denominacion='{$this->getDenominacion()}',cuit='{$this->getCuit()}',direccion='{$this->getDireccion()}',telefono='{$this->getTelefono()}',email='{$this->getEmail()}',contactoUno='{$this->getContactoUno()}',contactoDos='{$this->getContactoDos()}',origen='{$this->getOrigen()}',destino='{$this->getDestino()}',fecha_carga='{$this->getFechaCarga()}',tipo='{$this->getTipo()}',peso_neto='{$this->getPesoNeto()}',temperatura='{$this->getTemperatura()}',IMOClass='{$this->getIMOClass()}',IMOSClass='{$this->getIMOSclass()}',kilometros='{$this->getKilometros()}',combustible='{$this->getCombustible()}',ETD='{$this->getETD()}',ETA='{$this->getETA()}',viaticos='{$this->getViaticos()}',peajesYPesajes='{$this->getPeajesYPesajes()}',extras='{$this->getExtras()}',hazard='{$this->getHazard()}',reefer='{$this->getReefer()}',fee='{$this->getFee()}',total='{$this->getTotal()}'";
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
    public function calcularTotal(){
        $peaje=250;
        $calculoTotalCombustible = ($this->getCombustible() * $this->getKilometros());
        $totalPeajeYPesaje= ($peaje * $this->getPeajesYPesajes());
        $totalCompleto=($calculoTotalCombustible)+($totalPeajeYPesaje)+($this->getFee())+($this->getExtras())+($this->getViaticos());
        $this->setTotal($totalCompleto);
        $sql = "UPDATE proforma SET total='{$this->getTotal()}'";
        $sql .= " WHERE id={$this->id};";

        $this->db->query($sql);

        return $this->getTotal();
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

    /**
     * @return mixed
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * @param mixed $denominacion
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param mixed $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getContactoUno()
    {
        return $this->contactoUno;
    }

    /**
     * @param mixed $contactoUno
     */
    public function setContactoUno($contactoUno)
    {
        $this->contactoUno = $contactoUno;
    }

    /**
     * @return mixed
     */
    public function getContactoDos()
    {
        return $this->contactoDos;
    }

    /**
     * @param mixed $contactoDos
     */
    public function setContactoDos($contactoDos)
    {
        $this->contactoDos = $contactoDos;
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
    public function getIdViaje()
    {
        return $this->idViaje;
    }

    /**
     * @param mixed $idViaje
     */
    public function setIdViaje($idViaje)
    {
        $this->idViaje = $idViaje;
    }


}