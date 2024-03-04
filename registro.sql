create database registro;
use registro;
create table registros_usuarios
(
id_registros int auto_increment,
Nombre varchar(35) not null,
Apellido_paterno varchar(40) not null,
Apellido_materno varchar(40) not null,
telefono VARCHAR(10) CHECK (LENGTH(telefono) = 10 AND telefono REGEXP '^[0-9]+$'),
correo varchar(40) unique not null,
crea_usuario varchar(15) unique not null,
password varchar(15) not null,
primary key (id_registros)
);

insert into registros_usuarios (Nombre,Apellido_paterno,Apellido_materno,telefono,correo,crea_usuario,password)
values('aaron','higuera','calixto','8186882850','aa@gmai.com','op14','14');


select * from registros_usuarios; 

-- completar en mysql ---------------------------------------------------------------------------------------------------------------
create table registros_dentistas
(
id_registros_dent int auto_increment,
Nombre varchar(35) not null,
Apellido_app varchar (35) not null,
Apellido_apm varchar (35) not null,
telefono VARCHAR(10) CHECK (LENGTH(telefono) = 10 AND telefono REGEXP '^[0-9]+$'),
correo varchar(40) unique not null,
experiencia varchar(599) not null,
titulos_certificaciones varchar(599) not null,
referencia_profecional varchar(599) not null,
crea_usuario varchar(15) unique not null,
password varchar(15) not null,
primary key (id_registros_dent)
);

insert into registros_dentistas(Nombre,Apellido_app,Apellido_apm,telefono,correo,experiencia,titulos_certificaciones,referencia_profecional,crea_usuario,password)
values('aaron','higuera','calixto','8186882850','aa@gmail.com','5 años','cerificado en ordoctodologia','clinica 6','aaron87','aaron7');

select * from registros_dentistas;

create table historial_dent (
    id_historial int auto_increment,
    id_usuario int,
    fecha_visita date,
    motivo_visita varchar(255),
    diagnostico varchar(255),
    tratamiento_realizado varchar(255),
    recomendaciones text, -- puede almacenar una cantidad variable de texto--
    proxima_cita date,
    estado_cuenta varchar(50),
    primary key (id_historial),
    foreign key (id_usuario) references registros_usuarios(id_registros)
);

CREATE TABLE clinica (
    id_clinica int auto_increment,
    nombre varchar(100) not null,
    direccion varchar(255) not null,
    telefono VARCHAR(15) CHECK (LENGTH(telefono) = 10 AND telefono REGEXP '^[0-9]+$'),
    correo varchar(100) not null,
    horario_atencion varchar(255),
    dentista_principal int,
    capacidad_pacientes int,
    servicios_ofrecidos text,
    primary key (id_clinica),
    FOREIGN KEY (dentista_principal) REFERENCES registros_dentistas(id_registros_dent)
);

CREATE TABLE citas (
    id_cita int AUTO_INCREMENT PRIMARY KEY,
    id_usuario int,
    id_dentista int,
    fecha_cita datetime, --  se usa cuando se necesita valores que contienen tanto la fecha y la hora. MySQL recupera y muestra los valores DATETIME en 'AAAA-MM-DD HH: MM: SS' --
    notas text,
    FOREIGN KEY (id_usuario) REFERENCES registros_usuarios(id_registros),
    FOREIGN KEY (id_dentista) REFERENCES registros_dentistas(id_registros_dent)
);

CREATE TABLE pagos (
    id_pago int AUTO_INCREMENT PRIMARY KEY,
    id_usuario int,
    monto decimal(10, 2),  -- La precision es de 10 digitos en total, con 2 digitos para la parte decimal. Por ejemplo, el costo podría ser 150.00--
    fecha_pago date,
    metodo_pago varchar(50),
    motivo varchar(255),
    FOREIGN KEY (id_usuario) REFERENCES registros_usuarios(id_registros)
);

CREATE TABLE tratamientos (
    id_tratamiento int AUTO_INCREMENT PRIMARY KEY,
    id_usuario int,
    id_dentista int,
    tipo_tratamiento varchar(100),
    fecha_tratamiento date,
    costo decimal(10, 2),  -- La precision es de 10 digitos en total, con 2 digitos para la parte decimal. Por ejemplo, el costo podría ser 150.00--
    detalles text,
    FOREIGN KEY (id_usuario) REFERENCES registros_usuarios(id_registros),
    FOREIGN KEY (id_dentista) REFERENCES registros_dentistas(id_registros_dent)
);

CREATE TABLE facturacion (
    id_factura int AUTO_INCREMENT PRIMARY KEY,
    id_usuario int,
    id_dentista int,
    servicio varchar(255),
    costo decimal(10, 2), -- La precision es de 10 digitos en total, con 2 digitos para la parte decimal. Por ejemplo, el costo podría ser 150.00--
    fecha_factura date,
    FOREIGN KEY (id_usuario) REFERENCES registros_usuarios(id_registros),
    FOREIGN KEY (id_dentista) REFERENCES registros_dentistas(id_registros_dent)
);

-- triggers delete eliminacon pesentacion triggers ---------
