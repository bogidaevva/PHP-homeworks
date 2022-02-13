create database users;
use users;

create table if not exists tb_users
(   
    id int auto_increment primary key,
    login  varchar(255) not null,
    password varchar(40) not null
);
