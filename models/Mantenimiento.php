<?php
class Mantenimiento{

    private $id;
    private $fecha_service;
    private $km_unidad;
    private $costo;
    private $service_interno;
    private $service_externo;
    private $mecanico;
    private $repuestos_cambiados;
    private $idVehiculo;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function save()
    {
        $sql = "INSERT INTO mantenimiento(id,fecha_service,km_unidad,costo,service_interno,service_externo,mecanico,repuestos_cambiados,idVehiculo) 
        VALUES(NULL,'{$this->getFechaService()}', '{$this->getKmUnidad()}','{$this->getCosto()}', '{$this->getServiceInterno()}','{$this->getServiceExterno()}','{$this->getMecanico()}','{$this->getRepuestosCambiados()}','{$this->getIdVehiculo()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editar()
    {
        $sql = "UPDATE mantenimiento SET id='{$this->getId()}', fecha_service='{$this->getFechaService()}',km_unidad='{$this->getKmUnidad()}', costo='{$this->getCosto()}',service_interno='{$this->getServiceInterno()}',service_externo='{$this->getServiceExterno()}',mecanico='{$this->getMecanico()}',repuestos_cambiados='{$this->getRepuestosCambiados()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getAll(){
        $mantenimiento = $this->db->query("SELECT * FROM mantenimiento ORDER BY id DESC");

        return $mantenimiento;
    }

    public function getOne(){
        $mantenimiento = $this->db->query("SELECT * FROM mantenimiento WHERE id = {$this->getId()}");
        return $mantenimiento->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM mantenimiento WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

    public function realizarServiceVehiculo($idReparacion){
        $sql = "UPDATE vehiculo SET kilometraje=0 where id='{$idReparacion}'";
        $service = $this->db->query($sql);
        $result = false;
        if($service){
            $result = true;
        }
        return $result;
    }
    public function actualizarKilometrosTotales($kilometros_totales_vehiculo){
        $sql = "UPDATE vehiculo SET kilometros_totales='{$kilometros_totales_vehiculo}' where id='{$this->getIdVehiculo()}'";
        $service = $this->db->query($sql);
        $result = false;
        if($service){
            $result = true;
        }
        return $result;
    }
    public function verKmVehiculo($idVehiculoParaKm){
        $sql = "SELECT v.kilometros_totales FROM vehiculo as v WHERE id ='{$idVehiculoParaKm}'";

        $proforma = mysqli_query($this->db, $sql);
        $result = mysqli_fetch_array($proforma);
        return $result['kilometros_totales'];
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





    public function getFechaService()
    {
        return $this->fecha_service;
    }

    /**
     * @param mixed $fecha_service
     */
    public function setFechaService($fecha_service)
    {
        $this->fecha_service = $fecha_service;
    }

    /**
     * @return mixed
     */
    public function getKmUnidad()
    {
        return $this->km_unidad;
    }

    /**
     * @param mixed $km_unidad
     */
    public function setKmUnidad($km_unidad)
    {
        $this->km_unidad = $km_unidad;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getServiceInterno()
    {
        return $this->service_interno;
    }

    /**
     * @param mixed $service_interno
     */
    public function setServiceInterno($service_interno)
    {
        $this->service_interno = $service_interno;
    }

    /**
     * @return mixed
     */
    public function getServiceExterno()
    {
        return $this->service_externo;
    }

    /**
     * @param mixed $service_externo
     */
    public function setServiceExterno($service_externo)
    {
        $this->service_externo = $service_externo;
    }

    /**
     * @return mixed
     */
    public function getMecanico()
    {
        return $this->mecanico;
    }

    /**
     * @param mixed $mecanico
     */
    public function setMecanico($mecanico)
    {
        $this->mecanico = $mecanico;
    }

    /**
     * @return mixed
     */
    public function getRepuestosCambiados()
    {
        return $this->repuestos_cambiados;
    }

    /**
     * @param mixed $repuestos_cambiados
     */
    public function setRepuestosCambiados($repuestos_cambiados)
    {
        $this->repuestos_cambiados = $repuestos_cambiados;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }

    /**
     * @param mixed $idVehiculo
     */
    public function setIdVehiculo($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;
    }




}
