/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 10                       */
/* Created on:     3/1/2015 4:47:51 PM                          */
/*==============================================================*/


/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG 
(
   ID_BARANG            numeric(5)                     not null,
   ID_KATEGORI          numeric(5)                     null,
   NAMA_BARANG          long varchar                   null,
   HARGA_BELI           integer                        null,
   HARGA_JUAL           integer                        null,
   STOK                 integer                        null,
   GAMBAR               long binary                    null,
   constraint PK_BARANG primary key (ID_BARANG)
);

/*==============================================================*/
/* Table: DAFTAR_BARANG                                         */
/*==============================================================*/
create table DAFTAR_BARANG 
(
   ID_DAFTAR_BARANG     numeric(5)                     not null,
   ID_BARANG            numeric(5)                     null,
   ID_FAKTUR            numeric(5)                     null,
   JUMLAH               integer                        null,
   constraint PK_DAFTAR_BARANG primary key (ID_DAFTAR_BARANG)
);


/*==============================================================*/
/* Table: KASIR                                                 */
/*==============================================================*/
create table KASIR 
(
   ID_KASIR             numeric(5)                     not null,
   NAMA_KASIR           long varchar                   null,
   ALAMAT               long varchar                   null,
   TELEPON              numeric(12)                    null,
   constraint PK_KASIR primary key (ID_KASIR)
);


/*==============================================================*/
/* Table: KATEGORI                                              */
/*==============================================================*/
create table KATEGORI 
(
   ID_KATEGORI          numeric(5)                     not null,
   NAMA_KATEGORI        long varchar                   null,
   constraint PK_KATEGORI primary key (ID_KATEGORI)
);

/*==============================================================*/
/* Table: PENJUALAN                                             */
/*==============================================================*/
create table PENJUALAN 
(
   ID_FAKTUR            numeric(5)                     not null,
   ID_KASIR             numeric(5)                     null,
   WAKTU                timestamp                      null,
   TOTAL_PEMBAYARAN     integer                        null,
   constraint PK_PENJUALAN primary key (ID_FAKTUR)
);


alter table BARANG
   add constraint FK_BARANG_RELATIONS_KATEGORI foreign key (ID_KATEGORI)
      references KATEGORI (ID_KATEGORI);

alter table DAFTAR_BARANG
   add constraint FK_DAFTAR_B_RELATIONS_PENJUALA foreign key (ID_FAKTUR)
      references PENJUALAN (ID_FAKTUR);

alter table DAFTAR_BARANG
   add constraint FK_DAFTAR_B_RELATIONS_BARANG foreign key (ID_BARANG)
      references BARANG (ID_BARANG);

alter table PENJUALAN
   add constraint FK_PENJUALA_RELATIONS_KASIR foreign key (ID_KASIR)
      references KASIR (ID_KASIR);

