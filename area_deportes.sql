create database area_deportes CHARACTER SET utf8 COLLATE utf8_general_ci;
use area_deportes;

create table admin(
id_admin int primary key not null auto_increment,
email varchar(70) not null,
pwd varchar(250) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

insert into admin values("1","super_user@gmail.com","0192023a7bbd73250516f069df18b500");

/*admin123*/

create table registros(
id_registros int primary key not null auto_increment,
tipo varchar(40) not null,
email varchar(250) not null,
paterno varchar(60) not null,
materno varchar(60) not null,
nombre varchar(60) not null,
dia int(2) not null,
mes varchar(20) not null,
anio int(4) not null,
lu_na varchar(80) not null,
edad int(3) not null,
sexo varchar(10) not null,
enfermedad varchar(50) not null,
sangre varchar(5) not null,
alergia varchar(50) not null,
ocupacion varchar(20) not null,
evento varchar(70) not null,
categoria varchar(20) not null,
fe_re varchar(50) not null,
costo int(2) not null,
equipo_uaem varchar(50) not null,
no_cuenta int(7) not null,
mes_egreso varchar(20) not null,
anio_egreso int (4) not null,
lic varchar(50) not null,
sem varchar(50) not null,
turno varchar(20) not null,
grupo varchar(20) not null,
pago varchar(2) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


create table eventos(
id_evento int primary key not null auto_increment,
nombre_evento varchar(100) not null,
dia_evento int(2) not null,
mes_evento int(2) not null,
anio_evento int(4) not null,
descripcion varchar(250) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;