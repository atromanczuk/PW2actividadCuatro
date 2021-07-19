USE php_work;
 -- select * from usuarios;
  select * from proforma;
 -- select * from chofer;
 -- drop table chofer;

drop table proforma;

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
  )

/*CREATE TABLE proforma (
id int not null auto_increment PRIMARY KEY
,numero int 
,fecha date);
*/
-- select * from proforma;


select * from carga;


CREATE TABLE costeo 
(id int not null auto_increment PRIMARY KEY
,kilometros varchar (200)
,combustible varchar (200)
,ETD varchar (200)
,ETA varchar (200)
,viaticos varchar (200)
,peajesYPesajes varchar (200)
,extras varchar (200)
,hazard varchar (200)
,reefer varchar (200)
,fee varchar (200)
,total varchar(200)

);

select * from costeo;

-- drop table carga;

CREATE TABLE carga 
(id int not null auto_increment PRIMARY KEY
,tipo varchar (200)
,peso_neto varchar (200)
,hazard varchar (200)
,reefer varchar (200)
,temperatura varchar (200)
,IMOClass varchar (200)
,IMOSclass varchar (200)
);

select * from carga;


CREATE TABLE viaje 
(id int not null auto_increment PRIMARY KEY
,destino varchar (200)
,ETA varchar (200)
,fecha_carga varchar (200)
,origen varchar (200));

select * from viaje;


/*UPDATE usuarios
SET password = "admin"
-- SET rol = "admin"
WHERE id = 7;

DELETE FROM  usuarios
WHERE id = 6;


ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
 BY 'sasa';

-- drop database  php_work
-- GRANT ALL PRIVILEGES ON php_work TO 'root'@'localhost'

 CREATE TABLE usuarios(
id int auto_increment not null PRIMARY KEY,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
pwd varchar(255)
);

/*create table viaje(
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
/*choferCREATE TABLE chofer
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
/*INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', null);
INSERT INTO usuarios VALUES(NULL, 'bbbbb', 'bbbb', 'bbbb@bb.com', 'bbbb', 'user', null);
INSERT INTO usuarios VALUES(NULL, 'cccc', 'cccccc', 'cccc@ccccc.com', 'cccccc', 'user', null);
*/
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


 */
 */
*/


