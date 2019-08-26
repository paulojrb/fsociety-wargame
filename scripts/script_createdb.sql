create user 'fsociety'@'localhost' IDENTIFIED BY 'mr_robot';
create database fsociety;
grant all privileges on fsociety.* to 'fsociety'@'localhost';
use fsociety;

create table phrases (
	cod_phrases smallint primary key auto_increment,
	phrase varchar(400) not null
);

create table tokens (
	cod mediumint primary key auto_increment,
	token varchar(64) not null unique
);

create table users (
	cod mediumint primary key auto_increment unique,
	username varchar(30) not null unique,
	nome varchar(20) null,
	img varchar(30) default 'avatar.svg' not null ,
	password varchar(64) not null,
	token mediumint not null ,
	constraint fk_tokens foreign key (token) references tokens ( cod )
);

create table flags (
	cod mediumint primary key auto_increment unique,
	name_flag varchar(7) not null,
	flag varchar(64) not null unique,
	img varchar(40) not null unique
);

create table user_flag (
	user varchar(30) not null,
	cod_flag mediumint not null,
	constraint fk_user foreign key (user) references users (username),
	constraint fk_flag foreign key (cod_flag) references flags (cod),
	primary key (user, cod_flag)
);

insert into tokens ( token ) values ( SHA2(now(), 256) );
insert into users ( username, nome, password, token ) values (  'admin', 'administrator', SHA2('admin', 256), 1 );
insert into flags (name_flag, flag, img) values ( 'flag-01', SHA2('flag-01',256), 'planet_1.svg');
insert into flags (name_flag, flag, img) values ( 'flag-02', SHA2('flag-02',256), 'satellite.svg');
insert into flags (name_flag, flag, img) values ( 'flag-03', SHA2('flag-03',256), 'planets_all.svg');
insert into flags (name_flag, flag, img) values ( 'flag-04', SHA2('flag-04',256), 'meteorite.svg');
insert into flags (name_flag, flag, img) values ( 'flag-05', SHA2('flag-05',256), 'meteorite grand.svg');
insert into flags (name_flag, flag, img) values ( 'flag-06', SHA2('flag-06',256), 'solar-system.svg');
insert into flags (name_flag, flag, img) values ( 'flag-07', SHA2('flag-07',256), 'star.svg');
insert into flags (name_flag, flag, img) values ( 'flag-08', SHA2('flag-08',256), 'falling-star.svg');
insert into flags (name_flag, flag, img) values ( 'flag-09', SHA2('flag-09',256), 'black-hole.svg');
insert into flags (name_flag, flag, img) values ( 'flag-10', SHA2('flag-10',256), 'planet.svg');
insert into flags (name_flag, flag, img) values ( 'flag-11', SHA2('flag-11',256), 'planet (2).svg');
insert into flags (name_flag, flag, img) values ( 'flag-12', SHA2('flag-12',256), 'solar-system_2.svg');
insert into user_flag values ( 'admin', 1 );
insert into user_flag values ( 'admin',  2 );
insert into user_flag values ( 'admin',  3 );
insert into user_flag values ( 'admin',  4 );
insert into user_flag values ( 'admin',  5 );
insert into user_flag values ( 'admin',  6 );
insert into user_flag values ( 'admin',  7 );
insert into user_flag values ( 'admin',  8 );
insert into user_flag values ( 'admin',  9 );
insert into user_flag values ( 'admin',  10 );
insert into user_flag values ( 'admin',  11);

