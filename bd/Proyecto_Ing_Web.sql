/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     6/23/2013 3:57:53 PM                         */
/*==============================================================*/


drop table if exists ADMINISTRACION;

drop table if exists CARRERAS;

drop table if exists DOCENTES;

drop table if exists ESTUDIANTES;

drop table if exists EXPEDIENTE;

drop table if exists SESIONES;

/*==============================================================*/
/* Table: ADMINISTRACION                                        */
/*==============================================================*/
create table ADMINISTRACION
(
   ID_ADMIN             int not null auto_increment,
   USUARIO              varchar(70) not null,
   PASSWORD             varchar(50) not null,
   NOMBRES              varchar(100),
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: CARRERAS                                              */
/*==============================================================*/
create table CARRERAS
(
   ID_CARRERA           int not null auto_increment,
   CARRERA              varchar(150) not null,
   DESCRIPCION          varchar(140),
   primary key (ID_CARRERA)
);

/*==============================================================*/
/* Table: DOCENTES                                              */
/*==============================================================*/
create table DOCENTES
(
   ID_DOCENTE           int not null auto_increment,
   NOMBRES              varchar(100) not null,
   USUARIO              varchar(70) not null,
   PASSWORD             varchar(50) not null,
   primary key (ID_DOCENTE)
);

/*==============================================================*/
/* Table: ESTUDIANTES                                           */
/*==============================================================*/
create table ESTUDIANTES
(
   ID_ESTUDIANTE        int not null auto_increment,
   ID_DOCENTE           int,
   NOMBRES              varchar(100) not null,
   APELLIDOS            varchar(100) not null,
   SEXO                 text not null,
   EMAIL                varchar(200) not null,
   RESPONSABLE          varchar(100) not null,
   DIRECCION            varchar(300) not null,
   TEL_TRABAJO          varchar(15),
   CELULAR              varchar(15),
   TE_CASA              varchar(15),
   primary key (ID_ESTUDIANTE)
);

/*==============================================================*/
/* Table: EXPEDIENTE                                            */
/*==============================================================*/
create table EXPEDIENTE
(
   ID_EXPEDIENTE        int not null auto_increment,
   ID_CARRERA           int,
   ID_ESTUDIANTE        int,
   CUM                  float not null,
   ASIG_APROB           int not null,
   ASIGN_REPROB         int not null,
   ASIGN_RETIRADAS      int not null,
   primary key (ID_EXPEDIENTE)
);

/*==============================================================*/
/* Table: SESIONES                                              */
/*==============================================================*/
create table SESIONES
(
   ID_SESION            int not null auto_increment,
   ID_ESTUDIANTE        int,
   SESION_TUTORIAS      varchar(200),
   ACCIONES_RECOMENDADAS varchar(300),
   FECHA_SESION         datetime not null,
   OBSERVACIONES        varchar(140),
   primary key (ID_SESION)
);

alter table ESTUDIANTES add constraint FK_DOCENTES_ESTUDIANTES foreign key (ID_DOCENTE)
      references DOCENTES (ID_DOCENTE) on delete restrict on update restrict;

alter table EXPEDIENTE add constraint FK_CARRERAS_EXPEDIENTE foreign key (ID_CARRERA)
      references CARRERAS (ID_CARRERA) on delete restrict on update restrict;

alter table EXPEDIENTE add constraint FK_ESTUDIANTE_EXPEDIENTE foreign key (ID_ESTUDIANTE)
      references ESTUDIANTES (ID_ESTUDIANTE) on delete restrict on update restrict;

alter table SESIONES add constraint FK_ESTUDIANTE_SESIONES foreign key (ID_ESTUDIANTE)
      references ESTUDIANTES (ID_ESTUDIANTE) on delete restrict on update restrict;

