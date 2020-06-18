/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     18/06/2020 9:02:12                           */
/*==============================================================*/

/*==============================================================*/
/* Table: TBLAUDITORIA                                          */
/*==============================================================*/
create table TBLAUDITORIA 
(
   IDAUDITORIA          integer                        not null AUTO_INCREMENT,
   USUAUDITORIA         integer                        not null,
   DESCAUDITORIA        varchar(200)                   null,
   constraint PK_TBLAUDITORIA primary key (IDAUDITORIA)
);

/*==============================================================*/
/* Index: TBLAUDITORIA_PK                                       */
/*==============================================================*/
create unique index TBLAUDITORIA_PK on TBLAUDITORIA (
IDAUDITORIA ASC
);

/*==============================================================*/
/* Table: TBLAUTOR                                              */
/*==============================================================*/
create table TBLAUTOR 
(
   IDAUTOR              integer                        not null AUTO_INCREMENT,
   NOMAUTOR             varchar(30)                    not null,
   APEAUTOR             varchar(30)                    not null,
   ESTADOAUTOR          varchar(15)                    null,
   constraint PK_TBLAUTOR primary key (IDAUTOR)
);

/*==============================================================*/
/* Index: TBLAUTOR_PK                                           */
/*==============================================================*/
create unique index TBLAUTOR_PK on TBLAUTOR (
IDAUTOR ASC
);

/*==============================================================*/
/* Table: TBLEDITORIAL                                          */
/*==============================================================*/
create table TBLEDITORIAL 
(
   IDEDITORIAL          integer                        not null AUTO_INCREMENT,
   NOMEDITORIAL         varchar(100)                   not null,
   UBICACIONEDITORIAL   varchar(100)                   null,
   ESTADOEDITORIAL      varchar(10)                    not null,
   constraint PK_TBLEDITORIAL primary key (IDEDITORIAL)
);

/*==============================================================*/
/* Index: TBLEDITORIAL_PK                                       */
/*==============================================================*/
create unique index TBLEDITORIAL_PK on TBLEDITORIAL (
IDEDITORIAL ASC
);

/*==============================================================*/
/* Table: TBLEDITORIAL_TBLLIBRO                                 */
/*==============================================================*/
create table TBLEDITORIAL_TBLLIBRO 
(
   IDLIBRO              integer                        not null,
   IDEDITORIAL          integer                        not null,
   constraint PK_TBLEDITORIAL_TBLLIBRO primary key (IDLIBRO, IDEDITORIAL)
);

/*==============================================================*/
/* Index: TBLEDITORIAL_TBLLIBRO_PK                              */
/*==============================================================*/
create unique index TBLEDITORIAL_TBLLIBRO_PK on TBLEDITORIAL_TBLLIBRO (
IDLIBRO ASC,
IDEDITORIAL ASC
);

/*==============================================================*/
/* Index: TBLEDITORIAL_TBLLIBRO2_FK                             */
/*==============================================================*/
create index TBLEDITORIAL_TBLLIBRO2_FK on TBLEDITORIAL_TBLLIBRO (
IDEDITORIAL ASC
);

/*==============================================================*/
/* Index: TBLEDITORIAL_TBLLIBRO_FK                              */
/*==============================================================*/
create index TBLEDITORIAL_TBLLIBRO_FK on TBLEDITORIAL_TBLLIBRO (
IDLIBRO ASC
);

/*==============================================================*/
/* Table: TBLGENERO                                             */
/*==============================================================*/
create table TBLGENERO 
(
   IDGENERO             integer                        not null AUTO_INCREMENT,
   DESCGENERO           varchar(50)                    not null,
   ESTADOGENERO         varchar(15)                    not null,
   constraint PK_TBLGENERO primary key (IDGENERO)
);

/*==============================================================*/
/* Index: TBLGENERO_PK                                          */
/*==============================================================*/
create unique index TBLGENERO_PK on TBLGENERO (
IDGENERO ASC
);

/*==============================================================*/
/* Table: TBLLIBRO                                              */
/*==============================================================*/
create table TBLLIBRO 
(
   IDLIBRO              integer                        not null AUTO_INCREMENT,
   ISBNLIBRO            varchar(20)                    not null,
   NOMLIBRO             varchar(50)                    not null,
   ANIOLIBRO            integer                        null,
   PRECIOLIBRO          float(20)                      not null,
   IDUSULIBRO           integer                        null,
   ESTADOLIBRO          varchar(15)                    not null,
   constraint PK_TBLLIBRO primary key (IDLIBRO)
);

/*==============================================================*/
/* Index: TBLLIBRO_PK                                           */
/*==============================================================*/
create unique index TBLLIBRO_PK on TBLLIBRO (
IDLIBRO ASC
);

/*==============================================================*/
/* Table: TBLLIBRO_TBLAUTOR                                     */
/*==============================================================*/
create table TBLLIBRO_TBLAUTOR 
(
   IDAUTOR              integer                        not null,
   IDLIBRO              integer                        not null,
   constraint PK_TBLLIBRO_TBLAUTOR primary key (IDAUTOR, IDLIBRO)
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLAUTOR_PK                                  */
/*==============================================================*/
create unique index TBLLIBRO_TBLAUTOR_PK on TBLLIBRO_TBLAUTOR (
IDAUTOR ASC,
IDLIBRO ASC
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLAUTOR2_FK                                 */
/*==============================================================*/
create index TBLLIBRO_TBLAUTOR2_FK on TBLLIBRO_TBLAUTOR (
IDLIBRO ASC
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLAUTOR_FK                                  */
/*==============================================================*/
create index TBLLIBRO_TBLAUTOR_FK on TBLLIBRO_TBLAUTOR (
IDAUTOR ASC
);

/*==============================================================*/
/* Table: TBLLIBRO_TBLGENERO                                    */
/*==============================================================*/
create table TBLLIBRO_TBLGENERO 
(
   IDGENERO             integer                        not null,
   IDLIBRO              integer                        not null,
   constraint PK_TBLLIBRO_TBLGENERO primary key (IDGENERO, IDLIBRO)
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLGENERO_PK                                 */
/*==============================================================*/
create unique index TBLLIBRO_TBLGENERO_PK on TBLLIBRO_TBLGENERO (
IDGENERO ASC,
IDLIBRO ASC
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLGENERO2_FK                                */
/*==============================================================*/
create index TBLLIBRO_TBLGENERO2_FK on TBLLIBRO_TBLGENERO (
IDLIBRO ASC
);

/*==============================================================*/
/* Index: TBLLIBRO_TBLGENERO_FK                                 */
/*==============================================================*/
create index TBLLIBRO_TBLGENERO_FK on TBLLIBRO_TBLGENERO (
IDGENERO ASC
);

/*==============================================================*/
/* Table: TBLROL                                                */
/*==============================================================*/
create table TBLROL 
(
   IDROL                integer                        not null AUTO_INCREMENT,
   TIPOROL              varchar(30)                    not null,
   ESTADOROL            varchar(15)                    not null,
   constraint PK_TBLROL primary key (IDROL)
);

/*==============================================================*/
/* Index: TBLROL_PK                                             */
/*==============================================================*/
create unique index TBLROL_PK on TBLROL (
IDROL ASC
);

/*==============================================================*/
/* Table: TBLUSUARIO                                            */
/*==============================================================*/
create table TBLUSUARIO 
(
   IDUSUARIO            integer                        not null AUTO_INCREMENT,
   IDROL                integer                        not null,
   NOMUSUARIO           varchar(50)                    not null,
   USUUSUARIO           varchar(30)                    not null,
   PASSUSUARIO          varchar(200)                   not null,
   ESTADOUSUARIO        varchar(15)                    not null,
   constraint PK_TBLUSUARIO primary key (IDUSUARIO)
);

/*==============================================================*/
/* Index: TBLUSUARIO_PK                                         */
/*==============================================================*/
create unique index TBLUSUARIO_PK on TBLUSUARIO (
IDUSUARIO ASC
);

/*==============================================================*/
/* Index: TBLUSUARIO_TBLROL_FK                                  */
/*==============================================================*/
create index TBLUSUARIO_TBLROL_FK on TBLUSUARIO (
IDROL ASC
);

alter table TBLEDITORIAL_TBLLIBRO
   add constraint FK_TBLEDITO_TBLEDITOR_TBLLIBRO foreign key (IDLIBRO)
      references TBLLIBRO (IDLIBRO)
      on update cascade
      on delete cascade;

alter table TBLEDITORIAL_TBLLIBRO
   add constraint FK_TBLEDITO_TBLEDITOR_TBLEDITO foreign key (IDEDITORIAL)
      references TBLEDITORIAL (IDEDITORIAL)
      on update cascade
      on delete cascade;

alter table TBLLIBRO_TBLAUTOR
   add constraint FK_TBLLIBRO_TBLLIBRO__TBLAUTOR foreign key (IDAUTOR)
      references TBLAUTOR (IDAUTOR)
      on update cascade
      on delete cascade;

alter table TBLLIBRO_TBLAUTOR
   add constraint FK_TBLLIBRO_TBLLIBRO__TBLLIBRO_A foreign key (IDLIBRO)
      references TBLLIBRO (IDLIBRO)
      on update cascade
      on delete cascade;

alter table TBLLIBRO_TBLGENERO
   add constraint FK_TBLLIBRO_TBLLIBRO__TBLGENER foreign key (IDGENERO)
      references TBLGENERO (IDGENERO)
      on update cascade
      on delete cascade;

alter table TBLLIBRO_TBLGENERO
   add constraint FK_TBLLIBRO_TBLLIBRO__TBLLIBRO_G foreign key (IDLIBRO)
      references TBLLIBRO (IDLIBRO)
      on update cascade
      on delete cascade;

alter table TBLUSUARIO
   add constraint FK_TBLUSUAR_TBLUSUARI_TBLROL foreign key (IDROL)
      references TBLROL (IDROL)
      on update cascade
      on delete cascade;

