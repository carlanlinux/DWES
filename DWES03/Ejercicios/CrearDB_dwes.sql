create schema dwes collate utf8_general_ci;

create table familia
(
	cod varchar(6) not null
		primary key,
	nombre varchar(200) not null
);

create table producto
(
	cod varchar(12) not null
		primary key,
	nombre varchar(200) null,
	nombre_corto varchar(50) not null,
	descripcion text null,
	pvp decimal(10,2) not null,
	familia varchar(6) not null,
	constraint nombre_corto
		unique (nombre_corto),
	constraint producto_ibfk_1
		foreign key (familia) references familia (cod)
			on update cascade
);

create index familia
	on producto (familia);

create table tienda
(
	cod int auto_increment
		primary key,
	nombre varchar(100) not null,
	tlf varchar(13) null
);

create table stock
(
	producto varchar(12) not null,
	tienda int not null,
	unidades int not null,
	primary key (producto, tienda),
	constraint stock_ibfk1
		foreign key (producto) references producto (cod)
			on update cascade,
	constraint stock_ibfk_2
		foreign key (tienda) references tienda (cod)
			on update cascade
);

