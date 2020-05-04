create schema if not exists tres_raya collate utf8_general_ci;

create table if not exists Partida
(
	partida int auto_increment
		primary key,
	id_usuario int not null,
	tablero json null,
	terminada tinyint(1) default 0 null
);

create table if not exists usuario
(
	id int auto_increment
		primary key,
	nombre_usuario varchar(25) not null,
	partidas_totales int null,
	partidas_ganadas int null,
	partida int null
);

create index usuario_Partida_partida_fk
	on usuario (partida);