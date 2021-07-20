USE php_work;
-- drop database  php_work
-- GRANT ALL PRIVILEGES ON php_work TO 'root'@'localhost'
-- ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
 -- BY 'sasa';

CREATE TABLE usuarios(
                         id int auto_increment not null PRIMARY KEY,
                         nombre varchar(100) not null,
                         apellidos varchar(255),
                         email varchar(255) not null,
                         password varchar(255) not null,
                         rol varchar(20),
                         pwd varchar(255)
);


INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', 'admin');
UPDATE usuarios
SET password = "admin"
SET rol = "admin"
WHERE id = 1;






create table proforma (
 id int not null auto_increment PRIMARY KEY,
 numero int,
 fecha date,
 denominacion varchar(250),
  cuit varchar(250),
  direccion varchar(250),
  telefono  varchar(250),
  email varchar(250),
  contactoUno varchar(250),
  contactoDos varchar(250),
  origen varchar(250),
  destino varchar(250),
  fecha_carga date,
  tipo varchar(250),
  peso_neto int,  
  temperatura varchar(250),
  IMOClass varchar(250),
  IMOSclass varchar(250),
  kilometros int,
  combustible int,
  ETD varchar(250),
  ETA varchar(250),
  viaticos int,
  peajesYPesajes int,
  extras int,
  hazard varchar(250),
  reefer varchar(250),
  fee int,
  total int
  );

create table viaje(
id int not null auto_increment PRIMARY KEY,
vehiculo int,
origen varchar(200),
destino varchar (200),
chofer int,
cliente int,
tipo_carga varchar (200),
fecha date,
tiempo_estimado_viaje int,
tiempo_real int,
desviacion int,
kilometros_recorridos_previstos int,
kilometros_recorridos_reales int,
combustible_consumido_previsto int,
combustible_consumido_real int
);
CREATE TABLE chofer
(id int not null auto_increment PRIMARY KEY
,latitud varchar(200)
,longitud varchar(200)
,kilometros int
,combustible int
,viaticos int
,peajesYPesajes varchar(200)
,extras int
,fee int
,dni int
,total int
);

create table vehiculo(
id int not null auto_increment PRIMARY KEY,
marca varchar(200),
modelo varchar(200),
patente varchar(200),
nro_chasis varchar (200),
nro_motor varchar (200),
anio_fabricacion date,
calendarizacion_service date,
kilometraje int,
kilometros_totales int
);

create table mantenimiento(
        id int not null auto_increment PRIMARY KEY,
        fecha_service date,
        km_unidad int,
        costo int,
        service_interno int,
        service_externo int,
        mecanico int,
        repuestos_cambiados int,
        idVehiculo int
);

create table empleado (
      id int not null auto_increment PRIMARY KEY,
      dni varchar(200),
      nombre varchar(200),
      apellido varchar(200),
      fecha_nacimiento date,
      tipo_licencia varchar(200),
      tipo_empleado varchar(200)
);


