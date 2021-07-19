<?php


class Viaje
{


    private $id;
    private $vehículo;
    private $origen;
    private $destino;

    private $chofer;
    private $cliente;
    private $tipo_carga;
    private $fecha;

    private $tiempo_estimado_viaje;
    private $tiempo_real;
    private $desviacion;
    private $kilometros_recorridos_previstos;

    private $kilometros_recorridos_reales;
    private $combustible_consumido_previsto;
    private $combustible_consumido_real;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function save()
    {
        $sql = "INSERT INTO viaje (id,vehiculo,origen,destino,chofer,cliente,tipo_carga,fecha,tiempo_estimado_viaje,tiempo_real,desviacion,kilometros_recorridos_previstos, kilometros_recorridos_reales, combustible_consumido_previsto, combustible_consumido_real) 
        VALUES(NULL, '{$this->getVehículo()}', '{$this->getOrigen()}','{$this->getDestino()}','{$this->getChofer()}','{$this->getCliente()}','{$this->getTipoCarga()}','{$this->getFecha()}','{$this->getTiempoEstimadoViaje()}','{$this->getTiempoReal()}','{$this->getDesviacion()}','{$this->getKilometrosRecorridosPrevistos()}','{$this->getKilometrosRecorridosReales()}','{$this->getCombustibleConsumidoPrevisto()}','{$this->getCombustibleConsumidoReal()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editar()
    {
        $sql = "UPDATE viaje SET id='{$this->getId()}',vehiculo='{$this->getVehículo()}',origen='{$this->getOrigen()}',destino='{$this->getDestino()}',chofer='{$this->getChofer()}',cliente='{$this->getCliente()}',tipo_carga='{$this->getTipoCarga()}',fecha='{$this->getFecha()}',tiempo_estimado_viaje='{$this->getTiempoEstimadoViaje()}', tiempo_real='{$this->getTiempoReal()}',desviacion='{$this->getDesviacion()}',kilometros_recorridos_previstos='{$this->getKilometrosRecorridosPrevistos()}',kilometros_recorridos_reales='{$this->getKilometrosRecorridosReales()}',combustible_consumido_previsto='{$this->getCombustibleConsumidoPrevisto()}',combustible_consumido_real='{$this->getCombustibleConsumidoReal()}'";
        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getAll()
    {
        $viajes = $this->db->query("SELECT * FROM viaje ORDER BY id DESC");
        return $viajes;
    }

    public function getOne()
    {
        $viaje = $this->db->query("SELECT * FROM viaje WHERE id = {$this->getId()}");
        return $viaje->fetch_object();
    }

    public function delete()
    {
        $sql = "DELETE FROM viaje WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function finalizar()
    {
        //   $this->delete();

        //return $result;
    }

    public function obtenerProforma($idproforma)
    {
        $sql = "SELECT p.id,p.kilometros,p.combustible,p.ETD,p.ETA,p.viaticos,p.peajesYPesajes,p.extras,p.hazard,p.reefer,p.fee,p.total
 FROM viaje as v INNER JOIN proforma as p ON p.idViaje=v.id WHERE v.id='{$idproforma}'";

        $proforma = mysqli_query($this->db, $sql);
        $result = mysqli_fetch_array($proforma);
        return $result;
    }

    public function obtenerFacturaFinalChofer($idChofer)
    {
        $sql = "SELECT c.id,c.kilometros,c.combustible,c.viaticos,c.peajesYPesajes,c.extras,c.fee,c.total
 FROM viaje as v INNER JOIN chofer as c ON c.id=v.chofer WHERE c.id='{$idChofer}'";
        $facturaFinal = mysqli_query($this->db, $sql);
        $result = mysqli_fetch_array($facturaFinal);
        return $result;
    }

    public function analizarMantenimiento($idVehiculo){
        $sql = "SELECT v.kilometraje FROM vehiculo as v WHERE id={$idVehiculo}";
        $kilometraje = mysqli_query($this->db, $sql);
        $result = mysqli_fetch_array($kilometraje);
        return $result;
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
    public function getVehículo()
    {
        return $this->vehículo;
    }

    /**
     * @param mixed $vehículo
     */
    public function setVehículo($vehículo)
    {
        $this->vehículo = $vehículo;
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
    public function getChofer()
    {
        return $this->chofer;
    }

    /**
     * @param mixed $chofer
     */
    public function setChofer($chofer)
    {
        $this->chofer = $chofer;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getTipoCarga()
    {
        return $this->tipo_carga;
    }

    /**
     * @param mixed $tipo_carga
     */
    public function setTipoCarga($tipo_carga)
    {
        $this->tipo_carga = $tipo_carga;
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
    public function getTiempoEstimadoViaje()
    {
        return $this->tiempo_estimado_viaje;
    }

    /**
     * @param mixed $tiempo_estimado_viaje
     */
    public function setTiempoEstimadoViaje($tiempo_estimado_viaje)
    {
        $this->tiempo_estimado_viaje = $tiempo_estimado_viaje;
    }

    /**
     * @return mixed
     */
    public function getTiempoReal()
    {
        return $this->tiempo_real;
    }

    /**
     * @param mixed $tiempo_real
     */
    public function setTiempoReal($tiempo_real)
    {
        $this->tiempo_real = $tiempo_real;
    }

    /**
     * @return mixed
     */
    public function getDesviacion()
    {
        return $this->desviacion;
    }

    /**
     * @param mixed $desviacion
     */
    public function setDesviacion($desviacion)
    {
        $this->desviacion = $desviacion;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getKilometrosRecorridosPrevistos()
    {
        return $this->kilometros_recorridos_previstos;
    }

    /**
     * @param mixed $kilometros_recorridos_previstos
     */
    public function setKilometrosRecorridosPrevistos($kilometros_recorridos_previstos)
    {
        $this->kilometros_recorridos_previstos = $kilometros_recorridos_previstos;
    }

    /**
     * @return mixed
     */
    public function getKilometrosRecorridosReales()
    {
        return $this->kilometros_recorridos_reales;
    }

    /**
     * @param mixed $kilometros_recorridos_reales
     */
    public function setKilometrosRecorridosReales($kilometros_recorridos_reales)
    {
        $this->kilometros_recorridos_reales = $kilometros_recorridos_reales;
    }

    /**
     * @return mixed
     */
    public function getCombustibleConsumidoPrevisto()
    {
        return $this->combustible_consumido_previsto;
    }

    /**
     * @param mixed $combustible_consumido_previsto
     */
    public function setCombustibleConsumidoPrevisto($combustible_consumido_previsto)
    {
        $this->combustible_consumido_previsto = $combustible_consumido_previsto;
    }

    /**
     * @return mixed
     */
    public function getCombustibleConsumidoReal()
    {
        return $this->combustible_consumido_real;
    }

    /**
     * @param mixed $combustible_consumido_real
     */
    public function setCombustibleConsumidoReal($combustible_consumido_real)
    {
        $this->combustible_consumido_real = $combustible_consumido_real;
    }








}