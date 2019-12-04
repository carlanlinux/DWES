create database widget_corp

create table subjects (
         id int not null auto_increment,
         menu_name varchar(30) not null ,
         position int(3) not null,
         visible tinyint(1) not null ,
         primary key (id)
     )

create table pages (
    id int not null auto_increment,
    menu_name varchar(30) not null,
    position integer(3) not null,
    visible tinyint not null,
    content text,
    PRIMARY KEY (id)
);

create table users (
    id int not null auto_increment,
    name varchar(50) not null,
    password varchar(40), not null
    PRIMARY KEY (id)

)

alter table pages add subject_id int(11) not null  after id;

insert into widget_corp.pages (subject_id, menu_name, position, visible, content)
values (1,'History',1,1,'This is the History of the company');