CREATE DATABASE cadastro_cinema;
USE cadastro_cinema;
CREATE TABLE moderador
(
    id_mod int NOT NULL AUTO_INCREMENT,
    nome_mod varchar(50),
    login_mod varchar(20),
    email_mod varchar(40),
    psw_mod varchar(50),
    PRIMARY KEY (id_mod)
);
CREATE TABLE usuario
(
    id_user int NOT NULL AUTO_INCREMENT,
    nome varchar(20),
    sobrenome varchar(20),
    data_nasc date,
    sexo char(1),
    log varchar(20),
    email_user varchar(40),
    psw_user varchar(50),
    PRIMARY KEY (id_user)
);
INSERT INTO moderador (nome_mod, login_mod, email_mod, psw_mod)
VALUES ("Moderador", "maxceo", "zz@hotmail.com", "adm");