<?php


class Vehiculo{


    private $id;
    private $marca;
    private $modelo;
    private $patente;
    private $nro_chasis;
    private $nro_motor;
    private $anio_fabricacion;
    private $calendarizacion_service;
    private $kilometraje;
    private $kilometros_totales;


    public function __construct() {
        $this->db = Database::connect();
    }
    public function save(){
        $sql = "INSERT INTO vehiculo(id,marca,modelo,patente,nro_chasis,nro_motor,anio_fabricacion,calendarizacion_service,kilometraje,kilometros_totales) 
        VALUES(NULL, '{$this->getMarca()}', '{$this->getModelo()}','{$this->getPatente()}','{$this->getNroChasis()}','{$this->getNroMotor()}','{$this->getAnioFabricacion()}','{$this->getCalendarizacionService()}','{$this->getKilometraje()}','{$this->getKilometrosTotales()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function editar(){
        $sql = "UPDATE vehiculo SET id='{$this->getId()}',modelo='{$this->getModelo()}',patente='{$this->getPatente()}',nro_chasis='{$this->getNroChasis()}',nro_motor='{$this->getNroMotor()}',anio_fabricacion='{$this->getAnioFabricacion()}',calendarizacion_service='{$this->getCalendarizacionService()}',kilometraje='{$this->getKilometraje()}',kilometros_totales='{$this->getKilometrosTotales()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getAll(){
        $vehiculos = $this->db->query("SELECT * FROM vehiculo ORDER BY id DESC");
        return $vehiculos;
    }
    public function getOne(){
        $vehiculo = $this->db->query("SELECT * FROM vehiculo WHERE id = {$this->getId()}");
        return $vehiculo->fetch_object();
    }
    public function delete(){
        $sql = "DELETE FROM vehiculo WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    public function calcularKilometrosTotales($kilometraje_parcial){
        if($this->cantidadTotalServices()>0){
            return (($this->cantidadTotalServices()) * 100000)+($kilometraje_parcial);

        }
        return ($kilometraje_parcial);
    }
    public function cantidadTotalServices(){
        $sql = "SELECT count(m.idVehiculo) as idVehiculo FROM mantenimiento as m WHERE m.idVehiculo='{$this->getId()}'";

        $proforma = mysqli_query($this->db, $sql);
        $result = mysqli_fetch_array($proforma);
        return $result['idVehiculo'];
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
    public function getNroChasis()
    {
        return $this->nro_chasis;
    }

    /**
     * @param mixed $nro_chasis
     */
    public function setNroChasis($nro_chasis)
    {
        $this->nro_chasis = $nro_chasis;
    }

    /**
     * @return mixed
     */
    public function getNroMotor()
    {
        return $this->nro_motor;
    }

    /**
     * @param mixed $nro_motor
     */
    public function setNroMotor($nro_motor)
    {
        $this->nro_motor = $nro_motor;
    }

    /**
     * @return mixed
     */
    public function getAnioFabricacion()
    {
        return $this->anio_fabricacion;
    }

    /**
     * @param mixed $anio_fabricacion
     */
    public function setAnioFabricacion($anio_fabricacion)
    {
        $this->anio_fabricacion = $anio_fabricacion;
    }

    /**
     * @return mixed
     */
    public function getCalendarizacionService()
    {
        return $this->calendarizacion_service;
    }

    /**
     * @param mixed $calendarizacion_service
     */
    public function setCalendarizacionService($calendarizacion_service)
    {
        $this->calendarizacion_service = $calendarizacion_service;
    }

    /**
     * @return mixed
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * @param mixed $kilometraje
     */
    public function setKilometraje($kilometraje)
    {
        $this->kilometraje = $kilometraje;
    }

    /**
     * @return mixed
     */
    public function getKilometrosTotales()
    {
        return $this->kilometros_totales;
    }

    /**
     * @param mixed $kilometros_totales
     */
    public function setKilometrosTotales($kilometros_totales): void
    {
        $this->kilometros_totales = $kilometros_totales;






    }
    public function setKilometrosTotales2($kilometros_totales){
        $this->kilometros_totales = $kilometros_totales;

    }






}